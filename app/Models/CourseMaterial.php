<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    use HasFactory;

    public function course()
    {
      return $this->belongsTo(Course::class);
    }

    public function batch_course_materials()
    {
        return $this->hasMany(BatchCourseMaterial::class);
    }

    public function course_material_module()
    {
       return $this->hasOne(CourseMaterialModule::class);
    }

    public function course_material_not_assigneds()
    {
        return $this->hasMany(CourseMaterialNotAssigned::class);
    }



}
