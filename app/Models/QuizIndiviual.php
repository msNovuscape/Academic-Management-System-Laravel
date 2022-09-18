<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizIndiviual extends Model
{
    use HasFactory;

    protected $fillable = ['admission_id','quiz_id','user_id','status'];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
