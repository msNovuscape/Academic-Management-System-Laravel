<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return $this->hasMany(StudentQuizBatch::class)->where('admission_id', Auth::user()->admission->id);
    }

    public function student_quiz_batches_list()
    {
        return $this->hasMany(StudentQuizBatch::class)->orderBy('id','desc');
    }
}
