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
}
