<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['created_by','course_id','name','time_period','status','date','remark'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function QuizQuestions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    public function quiz_batch()
    {
        return $this->hasOne(QuizBatch::class);
    }

    public function quiz_individual()
    {
        return $this->hasOne(QuizIndiviual::class);
    }


}
