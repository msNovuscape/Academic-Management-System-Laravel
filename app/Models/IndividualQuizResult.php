<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndividualQuizResult extends Model
{
    use HasFactory;

    public function student_quiz_individual()
    {
        return $this->belongsTo(StudentQuizIndividual::class);
    }
}
