<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterialNotAssigned extends Model
{
    use HasFactory;

    protected $fillable = ['admission_id', 'course_material_id'];
}
