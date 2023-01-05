<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterialModule extends Model
{
    use HasFactory;

    public function course_module()
    {
        return $this->belongsTo(CourseModule::class);
    }
}
