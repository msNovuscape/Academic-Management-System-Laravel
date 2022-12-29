<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class QuizIndiviual extends Model
{
    use HasFactory;

    protected $fillable = ['admission_id','quiz_id','user_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function student_quiz_individuals()
    {
        return $this->hasMany(StudentQuizIndividual::class)->where('admission_id', Auth::user()->admission->id);
    }

    public function student_quiz_individuals_list()
    {
        return $this->hasMany(StudentQuizIndividual::class)->orderBy('id', 'desc');
    }
}
