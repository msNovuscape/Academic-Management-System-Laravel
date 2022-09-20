<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentQuizQuestionBatch extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['student_quiz_batch_id','quiz_question_id'];

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
