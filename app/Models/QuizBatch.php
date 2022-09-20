<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizBatch extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id','batch_id','user_id','status'];

    public function quiz()
    {
       return $this->belongsTo(Quiz::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function student_quiz_batches()
    {
        return $this->hasMany(StudentQuizBatch::class);
    }
}
