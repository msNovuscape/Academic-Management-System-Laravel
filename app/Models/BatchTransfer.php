<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatchTransfer extends Model
{
    use HasFactory, SoftDeletes;

    public function admission()
    {
        return $this->belongsTo(Admission::class, 'admission_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function previous_batch()
    {
        return $this->belongsTo(Batch::class, 'previous_batch_id');
    }
}
