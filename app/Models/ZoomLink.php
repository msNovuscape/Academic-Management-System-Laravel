<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomLink extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'name', 'link', 'status'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
