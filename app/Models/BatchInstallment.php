<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchInstallment extends Model
{
    use HasFactory;
    protected $fillable = ['batch_id','installment_type','due_date','amount','amount_to_pay'];

    public function extend_date()
    {
        return $this->hasOne(ExtendDate::class);
    }
}
