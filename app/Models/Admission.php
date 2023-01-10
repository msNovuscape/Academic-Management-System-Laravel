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

    public function batch_quiz_results()
    {
        return $this->hasManyThrough(BatchQuizResult::class, StudentQuizBatch::class);
    }
    public function individual_quiz_results()
    {
        return $this->hasManyThrough(IndividualQuizResult::class, StudentQuizIndividual::class,'admission_id', 's_q_individual_id');
    }

    public function admissionBatchMaterialsByModule($moduleId)
    {
        return $this->hasMany(AdmissionBatchMaterial::class)->where('course_module_id', $moduleId);
    }

    public function admissionBatchMaterials()
    {
        return $this->hasMany(AdmissionBatchMaterial::class);
    }

//    public function courseMaterialModules()
//    {
//        return $this->belongsToMany(CourseMaterialModule::class, AdmissionBatchMaterial::class, 'admission_id');
//    }

    public function course_material_not_assigneds()
    {
        return $this->hasMany(CourseMaterialNotAssigned::class);
    }


}
