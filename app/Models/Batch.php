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
}
