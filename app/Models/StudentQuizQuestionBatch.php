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

}
