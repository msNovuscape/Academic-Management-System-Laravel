<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function finances()
    {
       return $this->hasMany(Finance::class);
    }

    public function student()
    {
       return $this->hasOne(Student::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function extend_dates()
    {
        return $this->hasMany(ExtendDate::class);
    }

    public function quiz_individuals()
    {
        return $this->hasMany(QuizIndiviual::class);
    }

    public function student_quiz_batches()
    {
        return $this->hasMany(StudentQuizBatch::class);
    }

    public function student_quiz_individuals()
    {
        return $this->hasMany(StudentQuizIndividual::class);
    }

    public function sCounselling()
    {
        return $this->hasOne(SCounselling::class);
    }

}
