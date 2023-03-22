<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Branch;
use App\Models\Course;
use App\Models\TechnicalExamTimeslot;

class TechnicalExam extends Model
{
    use HasFactory, SoftDeletes;

    public function courses(){
        return $this->belongsToMany(Course::class,'course_technical_exam','technical_exam_id','course_id');

    }
    public function branches(){
        return $this->belongsToMany(Branch::class,'branch_technical_exam','technical_exam_id','branch_id');

    }
    public function technical_exam_timeslots(){
        return $this->belongsToMany(TechnicalExamTimeslot::class,'timeslot_technical_exam','technical_exam_id','technical_exam_timeslot_id');

    }
}
