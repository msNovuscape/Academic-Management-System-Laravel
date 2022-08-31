<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchCourseMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['batch_id','course_material_id'];

    public function batches()
    {
        return $this->belongsTo(Batch::class,'batch_id','id');
    }

    public function courseMaterial()
    {
        return $this->belongsTo(CourseMaterial::class);
    }
}
