<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtendDate extends Model
{
    use HasFactory;

    protected  $fillable = ['admission_id','batch_installment_id','finance_id','created_by','due_date'];
}
