<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCounselling extends Model
{
    use HasFactory;

    protected $fillable = ['created_by','admission_id','date','status'];

    public function studentCounsellingStatuses()
    {
        return $this->hasMany(SCounsellingStatus::class);
    }

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
}
