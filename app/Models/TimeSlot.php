<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{

    use HasFactory;

    protected $fillable = ['course_id','time_table_id','status'];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function time_table(){
        return $this->belongsTo(TimeTable::class);
    }

    public function branch()
    {
      return $this->belongsTo(Branch::class);
    }

    public function batches()
    {
      return $this->hasMany(Batch::class);
    }

}
