<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function time_slots(){
        return $this->hasMany(TimeSlot::class);
    }

    public function batches()
    {

       return $this->hasManyThrough(Batch::class,TimeSlot::class);
    }

    public function course_materials()
    {
        return $this->hasMany(CourseMaterial::class,'course_id');
    }

    public function quizzes(){
        return $this->hasMany(Quiz::class);
    }


}
