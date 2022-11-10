<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCounselling extends Model
{
    use HasFactory;

    protected $fillable = ['created_by','admission_id','date','status', 'attendance_status'];

    public function studentCounsellingStatuses()
    {
        return $this->hasMany(SCounsellingStatus::class);
    }

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function s_counselling_attendances()
    {
        return $this->hasMany(SCounsellingAttendance::class);
    }
    public function s_counselling_attendances_orderByDate()
    {
        return $this->hasMany(SCounsellingAttendance::class)->orderBy('date','desc');
    }
}
