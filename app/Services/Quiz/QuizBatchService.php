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
        $quiz_questions = $student_quiz_batch->quiz_batch->quiz->QuizQuestions;
        if($quiz_questions->count() > 0){
            $quiz_question = $quiz_questions->first();
            return $quiz_question;
        }else{
            return false;
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
                $setting->save();
                foreach ($option_ids as $in => $val){
                    $s_q_o_b_a = new StudentQuizQuestionBatchAnswer();
                    $s_q_o_b_a->s_q_q_b_id = $setting->id;
                    $s_q_o_b_a->quiz_option_id  = $val;
                    $s_q_o_b_a->save();
                }

            DB::commit();
                return $setting;
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }
}
