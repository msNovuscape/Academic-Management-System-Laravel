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

    public function student_quiz_question_batches()
    {
        return $this->hasMany(StudentQuizQuestionBatch::class,'student_quiz_batch_id')->orderBy('id','desc');
    }

    public function student_quiz_question_batches_list()
    {
        return $this->hasMany(StudentQuizQuestionBatch::class,'student_quiz_batch_id');
    }

    public function batch_quiz_result()
    {
       return $this->hasOne(BatchQuizResult::class);
    }
}
