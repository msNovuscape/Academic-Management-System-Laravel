<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentQuizIndividual extends Model
{
    use HasFactory, SoftDeletes;

    public function quiz_individual()
    {
        return $this->belongsTo(QuizIndiviual::class,'quiz_indiviual_id');
    }
    public function student_quiz_question_individuals()
    {
        return $this->hasMany(StudentQuizQuestionIndividual::class,'s_q_individual_id')->orderBy('id','desc');
    }
}
