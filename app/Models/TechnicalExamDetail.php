<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnicalExamDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function technical_exam(){
        return $this->belongsTo(TechnicalExam::class);
    }
    public function technical_exam_timeslot(){
        return $this->belongsTo(TechnicalExamTimeslot::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
