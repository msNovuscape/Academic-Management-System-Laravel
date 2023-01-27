<?php
namespace App\Services;

use App\Models\Admission;
use App\Models\DiscountLog;
use App\Models\ExtendDate;
use App\Models\Finance;
use App\Models\FinanceLog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinanceService {


    public function storeData($admission_id,$requestAll)
    {
       $setting1 = new Finance();
       $setting1->admission_id  = $admission_id;
       $setting1->created_by   = Auth::user()->id;
       $setting1->amount   = $requestAll['amount'];
       $setting1->date   = $requestAll['date'];
       $setting1->transaction_type   = array_search('Income',config('custom.transaction_types'));
       $setting1->save();
       return $setting1;
    }

    public function updateData($finance_id,$requestAll)
    {
        try {
            DB::beginTransaction();
                $setting1 = Finance::findOrFail($finance_id);
                //keeping the finance log
                $this->financeLog($setting1);
                $setting1->created_by   = Auth::user()->id;
                $setting1->amount   = $requestAll['amount'];
                $setting1->date   = $requestAll['date'];
                $setting1->status   = $requestAll['payment_status'];
                $setting1->bank_status   = $requestAll['bank_status'];
                $setting1->transaction_no   = $requestAll['transaction_no'];
                $setting1->remark   = $requestAll['remark'];
                $setting1->save();
            DB::commit();
            return $setting1;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function extendDate()
    {
        $finance = Finance::findOrFail(request('finance_id'));
        $setting = ExtendDate::firstOrNew(['admission_id' => request('admission_id'),'batch_installment_id' => request('batch_installment_id'),'finance_id' => request('finance_id')]);
        $setting->created_by = Auth::user()->id;
        $setting->due_date = request('due_date');
        $setting->save();
        $finance->extend_status = 2; // extend
        $finance->save();
        return $setting;
    }

    public function search()
    {
        $settings = Admission::whereHas('admissionBranch.branch.userBranches')->orderBy('id','desc');
        if(request('name')){
            $key = \request('name');
            $settings = $settings->whereHas('user',function ($u) use ($key){
                                    $u->where('name','like','%'.$key.'%');
                        })->orWhere('student_id','like','%'.$key.'%');
        }
        if(request('installment_status1')){
            $key = \request('installment_status1');
            $settings = $settings->whereHas('finances',function ($in1) use ($key){
                $in1->whereHas('batch_installment',function ($bi){
                    $bi->where('installment_type',1);
                })->where('status',$key);
            });
        }
        if(request('installment_status2')){
            $key = \request('installment_status2');
            $settings = $settings->whereHas('finances',function ($in1) use ($key){
                $in1->whereHas('batch_installment',function ($bi){
                    $bi->where('installment_type',2);
                })->where('status',$key);
            });
        }
        if(request('installment_status3')){
            $key = \request('installment_status3');
            $settings = $settings->whereHas('finances',function ($in1) use ($key){
                $in1->whereHas('batch_installment',function ($bi){
                    $bi->where('installment_type',3);
                })->where('status',$key);
            });
        }
        if(request('installment_bank_status1')){
            $key = \request('installment_bank_status1');
            $settings = $settings->whereHas('finances',function ($in1) use ($key){
                $in1->whereHas('batch_installment',function ($bi){
                    $bi->where('installment_type',1);
                })->where('bank_status',$key);
            });
        }
        if(request('installment_bank_status2')){
            $key = \request('installment_bank_status2');
            $settings = $settings->whereHas('finances',function ($in1) use ($key){
                $in1->whereHas('batch_installment',function ($bi){
                    $bi->where('installment_type',2);
                })->where('bank_status',$key);
            });
        }
        if(request('installment_bank_status3')){
            $key = \request('installment_bank_status3');
            $settings = $settings->whereHas('finances',function ($in1) use ($key){
                $in1->whereHas('batch_installment',function ($bi){
                    $bi->where('installment_type',3);
                })->where('bank_status',$key);
            });
        }

        if (request('course_id') && request('batch_id')) {
            $key = request('course_id');
            $key2 = request('batch_id');
            $settings = $settings->whereHas('batch.time_slot',function ($q) use($key){
                $q->where('course_id',$key);
            })->where('batch_id', $key2)->whereHas('finances');
        }
        if(request('course_id')){
            $key = \request('course_id');
            $settings = $settings->whereHas('batch.time_slot',function ($q) use($key){
                                $q->where('course_id',$key);
                        })->whereHas('finances');
        }
        if(request('batch_id')){
            $key = \request('batch_id');
            $settings = $settings->where('batch_id',$key);
        }

        if (request('per_page')) {
            $per_page = request('per_page');
            $settings = $settings->paginate($per_page);
        } else {
            $settings = $settings->paginate(config('custom.per_page'));
        }
        return $settings;
    }

    public function unPaidSearch()
    {
        $admissions = Admission::orderBy('id','desc');
        if(request('name') && request('date') && request('course_id') && request('batch_id')){

        }
        if(request('name')){
            $key = \request('name');
            $admissions = $admissions->whereHas('user',function ($u) use ($key){
                $u->where('name','like','%'.$key.'%');
            })->orWhere('student_id','like','%'.$key.'%');
        }

        $settings = Admission::where('status',4)->get(); //making empty admisssion object array
        foreach ($admissions->get() as $admission){
            $total_paid =  Finance::where('admission_id',$admission->id)->where('transaction_type',1)->sum('amount')
                - Finance::where('admission_id',$admission->id)->where('transaction_type',2)->sum('amount');
            $my_result = Finance::checkForStatus($admission,$total_paid);
            if($my_result == false){
                $settings = $settings->push($admission);
            }

        }
        return $this->paginate($settings);
    }

    public function paginate($items, $perPage = 50, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]);
    }


    public function financeLog($finance)
    {
        $setting = new FinanceLog();
        $setting->finance_id =  $finance->id;
        $setting->admission_id =  $finance->admission_id;
        $setting->batch_installment_id =  $finance->batch_installment_id;
        $setting->created_by =  $finance->created_by;
        $setting->amount = $finance->amount;
        $setting->created_date = $finance->date;
        $setting->updated_date = date('Y-m-d');
        $setting->status = $finance->status;
        $setting->transaction_no = $finance->transaction_no;
        $setting->extend_status = $finance->extend_status;
        $setting->bank_status = $finance->bank_status;
        $setting->remark = $finance->remark;
        $setting->save();
//        return $setting;
    }

    public function discountLog($discount)
    {
        $setting = new DiscountLog();
        $setting->discount_id = $discount->id;
        $setting->created_by =  $discount->created_by;
        $setting->admission_id = $discount->admission_id;
        $setting->amount = $discount->amount;
        $setting->created_date = $discount->date;
        $setting->updated_date = date('Y-m-d');
        $setting->save();
//        return $setting;
    }

}
