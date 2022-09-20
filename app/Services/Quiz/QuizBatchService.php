<?php
namespace App\Services\Quiz;

use App\Models\QuizQuestion;
use App\Models\StudentQuizBatch;
use App\Models\StudentQuizQuestionBatch;
use App\Models\StudentQuizQuestionBatchAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Nette\Utils\DateTime;

class QuizBatchService{

    public function getQuizSetting()
    {
        $student_quiz_batch_id = Session::get('student_quiz_batch_id');
        $student_quiz_batch = StudentQuizBatch::findOrFail($student_quiz_batch_id);
        //quiz has not started or student has not given any answer to quiz question
        if($student_quiz_batch->status == '0' || $student_quiz_batch->status == '1'){
            $quiz_questions = $student_quiz_batch->quiz_batch->quiz->QuizQuestions;
            if($quiz_questions->count() > 0){
                $quiz_question = $quiz_questions->first();
                $time_period = $quiz_question->quiz->time_period * 60;
                return [$quiz_question,0,$time_period];
            }else{
                return false;
            }
        }else{
            //quiz has given the quiz but left it by some technical or other reason (for status 2)
            $student_quiz_question_batches = $student_quiz_batch->student_quiz_question_batches;
            if($student_quiz_question_batches->count() > 0){
                $old_question_id = $student_quiz_question_batches->first()->quiz_question_id;
                $quiz_id = $student_quiz_question_batches->first()->quiz_question->quiz->id;
                $quiz_questions  = QuizQuestion::where('id', '>',$old_question_id)->where('quiz_id',$quiz_id)->get();
                if($quiz_questions->count() > 0){

                    $quiz_question = $quiz_questions->first();
                    //remaining time calculation for quiz
                    $initial_start_time = strtotime($student_quiz_batch->start_time);
                    $time_when_halt = strtotime($student_quiz_question_batches->first()->end_time);
                    $time_spend_before_halt = $time_when_halt - $initial_start_time;
                    $total_time_of_halt = strtotime(date('Y-m-d h:i:s')) - $time_when_halt;
                    $total_remaining_time = ($quiz_question->quiz->time_period * 60) - ($time_spend_before_halt + $total_time_of_halt);
                    return [$quiz_question,$student_quiz_question_batches->count(),$total_remaining_time];
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }


    }

    public function storeQuizAnswer($option_ids)
    {
        $student_quiz_batch_id = Session::get('student_quiz_batch_id');
        $student_quiz_batch = StudentQuizBatch::findOrFail($student_quiz_batch_id);
        $quiz_question = QuizQuestion::findOrFail(request('quiz_question_id'));
        try{
            DB::beginTransaction();
            //inserting data into  StudentQuizQuestionBatch table
                $setting = StudentQuizQuestionBatch::firstOrNew(['student_quiz_batch_id' => $student_quiz_batch->id,'quiz_question_id' => $quiz_question->id]);
//                $setting->student_quiz_batch_id = $student_quiz_batch->id;
////                $setting->quiz_question_id  = $quiz_question->id;
                $setting->end_time = date('Y-m-d h:i:s');
                $setting->save();
                foreach ($option_ids as $in => $val){
                    $s_q_o_b_a = new StudentQuizQuestionBatchAnswer();
                    $s_q_o_b_a->s_q_q_b_id = $setting->id;
                    $s_q_o_b_a->quiz_option_id  = $val;
                    $s_q_o_b_a->save();
                }
                $student_quiz_batch->status = '2';
                $student_quiz_batch->save(); //quiz has been started

            DB::commit();
                return $setting;
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }
}
