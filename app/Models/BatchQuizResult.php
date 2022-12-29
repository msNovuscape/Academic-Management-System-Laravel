<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchQuizResult extends Model
{
    use HasFactory;

    public function student_quiz_batch()
    {
        return $this->belongsTo(StudentQuizBatch::class);
    }
}
