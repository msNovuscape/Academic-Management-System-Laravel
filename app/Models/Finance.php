<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = ['admission_id','batch_installment_id','created_by','amount','date','status','transaction_no','bank_status'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function batch_installment()
    {
        return $this->belongsTo(BatchInstallment::class);
    }

    public function extend_date()
    {
        return $this->hasOne(ExtendDate::class);
    }

    public function extend_dates()
    {
        return $this->hasMany(ExtendDate::class);
    }



    public static function checkForStatus($admission,$total_paid)
    {
        $my_status = false;
        foreach ($admission->batch->batch_installments as $check_installment){
            if($total_paid >= $check_installment->amount_to_pay && $check_installment->due_date >= date('Y-m-d')){
                $my_status = true;
               break;
            }
        }
        return $my_status;
    }
}
