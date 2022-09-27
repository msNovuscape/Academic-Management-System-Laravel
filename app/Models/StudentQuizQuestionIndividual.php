<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentQuizQuestionIndividual extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['s_q_individual_id','quiz_question_id','end_time'];

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class,'quiz_question_id');
    }

    public function student_quiz_Individual()
    {
        return $this->belongsTo(StudentQuizIndividual::class,'s_q_individual_id');
    }

    public function student_quiz_question_individual_answers()
    {
       return $this->hasMany(StudentQuizQuestionIndividualAnswer::class,'s_q_q_i_id');
    }

    public static function ans_right_or_wrong($student_quiz_question_individual_id)
    {
        $result = 'Correct';
        $sqqi = StudentQuizQuestionIndividual::findOrFail($student_quiz_question_individual_id);
        foreach ($sqqi->student_quiz_question_individual_answers as $ans1){
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
