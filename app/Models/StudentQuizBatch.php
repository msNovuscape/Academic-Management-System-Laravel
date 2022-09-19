<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentQuizBatch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['quiz_batch_id','admission_id','date'];

    public function quiz_batch()
    {
        return $this->belongsTo(QuizBatch::class);
    }
}
