<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentQuizQuestionBatch extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['student_quiz_batch_id','quiz_question_id','end_time'];

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function student_quiz_batch()
    {
        return $this->belongsTo(StudentQuizBatch::class);
    }

    public function student_quiz_question_batch_answers()
    {
        return $this->hasMany(StudentQuizQuestionBatchAnswer::class,'s_q_q_b_id');
    }

    public static function ans_right_or_wrong($student_quiz_question_batch_id)
    {
        $result = 'Correct';
        $sqqi = StudentQuizQuestionBatch::findOrFail($student_quiz_question_batch_id);
        foreach ($sqqi->student_quiz_question_batch_answers as $ans1){
            $quiz_question_ans = QuizQuestionAnswer::where('quiz_question_id',$sqqi->quiz_question_id)
                ->where('quiz_option_id',$ans1->quiz_option_id)->get();
            if(count($quiz_question_ans) > 0){
                $result = 'Correct';
            }else{
                $result = 'Incorrect';
                break;
            }
        }
        return $result;
    }

}
