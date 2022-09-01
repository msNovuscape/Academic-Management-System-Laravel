<?php
namespace App\Services;

use App\Models\Admission as Model;
use App\Models\Batch;
use App\Models\Count;
use App\Models\Discount;
use App\Models\Finance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdmissionService
{


    public function storeData($requestAll)
    {
//        $batch = Batch::findOrFail($requestAll['batch_id']);
//        dd($batch->batch_installments->where('installment_type',1)->first());
        try{
            DB::beginTransaction();
            // Create User Account
            $user = new User();
            $user->name = $requestAll['name'];
            $user->email = $requestAll['email'];
            $user->password = Hash::make('password');
            $user->status = array_search('Active', config('custom.status')); //active
            $user->user_type = array_search('Student', config('custom.user_types'));
            $user->save();
            // Create User admission
            $batch = Batch::findOrFail($requestAll['batch_id']);
            $setting = new Model();
            $setting->user_id = $user->id;
            $setting->created_by = Auth::user()->id;
            $setting->batch_id = $batch->id;
            $setting->date = date('Y-m-d');
            $setting->student_id = $this->getStudentUserId();
            $setting->payable_amount = $batch->fee - request('discount');
            $setting->save();

            // Create income from student
            foreach ($batch->batch_installments as $batch_installment){

                if(request('amount') == $setting->payable_amount){
                    if($batch_installment->installment_type == 1){
                        $finance = Finance::firstOrNew(['admission_id' => $setting->id,'batch_installment_id'=> $batch_installment->id]);
                        $finance->created_by = Auth::user()->id;
                        $finance->amount = $requestAll['amount'];
                        $finance->date = $requestAll['date'];
//                        $finance->status = $requestAll['payment_status'];
                        $finance->status = array_search('Paid',config('custom.payment_status'));
                        $finance->transaction_no = $requestAll['transaction_no'];
                        $finance->bank_status = $requestAll['bank_status'];
                        $finance->remark = $requestAll['remark'];
                        $finance->save();
                    }else{
                        $finance = Finance::firstOrNew(['admission_id' => $setting->id,'batch_installment_id'=> $batch_installment->id]);
                        $finance->created_by = Auth::user()->id;
                        $finance->amount = 0.0;
                        $finance->date = $requestAll['date'];
                        $finance->status = array_search('Paid',config('custom.payment_status'));
                        $finance->transaction_no = '';
                        $finance->bank_status = $requestAll['bank_status'];
                        $finance->remark = '';
                        $finance->save();
                    }
                }else{
                    if($batch_installment->installment_type == 1){
                        $finance = Finance::firstOrNew(['admission_id' => $setting->id,'batch_installment_id'=> $batch_installment->id]);
                        $finance->created_by = Auth::user()->id;
                        $finance->amount = $requestAll['amount'];
                        $finance->date = $requestAll['date'];
                        $finance->status = $requestAll['payment_status'];
                        $finance->transaction_no = $requestAll['transaction_no'];
                        $finance->bank_status = $requestAll['bank_status'];
                        $finance->remark = $requestAll['remark'];
                        $finance->save();
                    }else{
                        $finance = Finance::firstOrNew(['admission_id' => $setting->id,'batch_installment_id'=> $batch_installment->id]);
                        $finance->created_by = Auth::user()->id;
                        $finance->amount = 0.0;
                        $finance->date = $requestAll['date'];
                        $finance->status = array_search('Unpaid',config('custom.payment_status')); // unpaid
                        $finance->transaction_no = '';
                        $finance->bank_status = 2; //unverified
                        $finance->remark = '';
                        $finance->save();
                    }
                }
            }
            //create discount for student
            $discount = new Discount();
            $discount->created_by = Auth::user()->id;
            $discount->admission_id = $setting->id;
            $discount->amount = $requestAll['discount'];
            $discount->date = $requestAll['date'];
            $discount->save();
            DB::commit();
            return $setting;
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }
    public function getStudentUserId()
    {
        $count = Count::getCount();
        $student_id = 'ET' . date('Y') . date('m') . $count;
        return $student_id;
    }

    public function updateData($requestAll, $id)
    {
        try{
            DB::beginTransaction();
            // Create User Account
            $setting = Model::findOrFail($id);
            $user = $setting->user;
            $user->name = $requestAll['name'];
            $user->email = $requestAll['email'];
            $user->password = Hash::make('password');
            $user->status = array_search('Active', config('custom.status')); //active
            $user->user_type = array_search('Student', config('custom.user_types'));
            $user->save();
            // Create User admission
            $batch = Batch::findOrFail($requestAll['batch_id']);
            $setting->user_id = $user->id;
            $setting->created_by = Auth::user()->id;
            $setting->batch_id = $batch->id;
            $setting->date = date('Y-m-d');
            $setting->student_id = $this->getStudentUserId();
            $setting->payable_amount = $batch->fee - request('discount');
            $setting->save();

            // Create income from student
            $finance = $setting->finances[0];
            $finance->amount = $requestAll['amount'];
            $finance->date = $requestAll['date'];
            $finance->status = $requestAll['payment_status'];
            $finance->transaction_no = $requestAll['transaction_no'];
            $finance->bank_status = $requestAll['bank_status'];
            $finance->remark = $requestAll['remark'];
            $finance->save();
            //create discount for student
            $discount = $setting->discount;
            $discount->created_by = Auth::user()->id;
            $discount->admission_id = $setting->id;
            $discount->amount = $requestAll['discount'];
            $discount->date = $requestAll['date'];
            $discount->save();
            DB::commit();
            return $setting;
        }
        catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }
}
