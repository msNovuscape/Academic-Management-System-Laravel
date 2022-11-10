<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCounsellingAttendance extends Model
{
    use HasFactory;
    protected $fillable = ['s_counselling_id','status','symbol','date'];

    public function s_counselling()
    {
        return $this->belongsTo(SCounselling::class);
    }

}
