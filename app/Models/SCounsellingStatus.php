<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCounsellingStatus extends Model
{
    use HasFactory;
    protected $fillable = ['s_counselling_id','status','comment'];
}
