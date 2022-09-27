<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentQuizQuestionBatchAnswer extends Model
{
    use HasFactory;

    public function quiz_option()
    {
        return $this->belongsTo(QuizOption::class);
    }
}
