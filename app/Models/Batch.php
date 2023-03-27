<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    public function time_slot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class,Admission::class);
    }

    public function admissions()
    {
      return $this->hasMany(Admission::class);
    }

    public function batch_installments()
    {
        return $this->hasMany(BatchInstallment::class);
    }

    public function batch_last_installment()
    {
            return $this->hasOne(BatchInstallment::class)->orderBy('id', 'desc')->latest();
    }

    public function batch_course_materials()
    {
        return $this->hasMany(BatchCourseMaterial::class);
    }

    public function quiz_batches()
    {
        return $this->hasMany(QuizBatch::class);
    }

    public function zoomLinkBatch()
    {
        return $this->hasOne(ZoomLinkBatch::class);
    }

    public function activeUserTeachersBatch()
    {
        return $this->hasMany(UserTeacherBatch::class)->where('status', '1');
    }

    public function activeUserTeacher()
    {
        return $this->belongsToMany(UserTeacher::class, 'user_teacher_batches', 'batch_id', 'user_teacher_id');
    }

    public function admission_batch_materials()
    {
        return $this->hasMany(AdmissionBatchMaterial::class);
    }

    public function active_previous_batch()
    {
       return $this->hasMany(BatchTransfer::class, 'previous_batch_id')->where('status', '1');
    }

    public function active_batch_transfer()
    {
        return $this->hasMany(BatchTransfer::class, 'batch_id')->where('status', 1);
    }


}
