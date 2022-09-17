<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    use HasFactory;

    public function quiz_question_answer()
    {
        return $this->hasOne(QuizQuestionAnswer::class,'quiz_option_id');
    }
}
