<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferBatchMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['batch_id', 'course_module_id', 'admission_id', 'batch_transfer_id'];
}
