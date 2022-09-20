<?php
namespace App\Services\Quiz;

use App\Models\QuizQuestion;
use App\Models\StudentQuizBatch;
use App\Models\StudentQuizQuestionBatch;
use App\Models\StudentQuizQuestionBatchAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class QuizBatchService{

    public function getQuizSetting()
    {
        $student_quiz_batch_id = Session::get('student_quiz_batch_id');
        $student_quiz_batch = StudentQuizBatch::findOrFail($student_quiz_batch_id);
        //quiz has not started or student has not given any answer to quiz question
        if($student_quiz_batch->status == '0'){
            $quiz_questions = $student_quiz_batch->quiz_batch->quiz->QuizQuestions;
            if($quiz_questions->count() > 0){
                $quiz_question = $quiz_questions->first();
                return $quiz_question;
            }else{
                return false;
            }
        }else{
            //quiz has given the quiz but left it by some technical or other reason
            $student_quiz_question_batches = $student_quiz_batch->student_quiz_question_batches->orderBy('id','desc');
            if($student_quiz_question_batches->count() > 0){
                $old_question_id = $student_quiz_question_batches->first()->quiz_question_id;
                $quiz_id = $student_quiz_question_batches->first()->quiz_question->quiz->id;
                $quiz_questions  = QuizQuestion::where('id', '>',$old_question_id)->where('quiz_id',$quiz_id)->get();
                if($quiz_questions->count() > 0){
                    $quiz_question = $quiz_questions->first();
                    return $quiz_question;
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
                $setting->start_time = date('h:i:s');
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
