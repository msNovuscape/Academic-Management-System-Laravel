<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_of_living');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

//    public function current_attendance($attendance_date)
//    {
//        return $this->hasMany(Attendance::class)->where('date',$attendance_date);
//    }

    public static function getMarks($student_quiz_batch)
    {
        if($student_quiz_batch->student_quiz_question_batches->count() > 0){
            foreach ($student_quiz_batch->student_quiz_question_batches as $student_quiz_question_batch){
//                if($student_quiz_question_batch->student_quiz_question_batch_answers->count() > 0){
                    dd($student_quiz_question_batch->student_quiz_question_batch_answers);
//                }
            }

        }else{
            return 0;
        }
    }

}
