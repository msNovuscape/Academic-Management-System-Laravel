<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function quiz_question_image()
    {
      return $this->hasOne(QuizQuestionImage::class);
    }

    public function quiz_options()
    {
        return $this->hasMany(QuizOption::class);
    }

    public function quiz_question_answers()
    {
        return $this->hasMany(QuizQuestionAnswer::class);
    }

}
