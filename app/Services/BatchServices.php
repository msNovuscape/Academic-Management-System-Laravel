<?php

namespace App\Services;

use App\Models\Batch;
use App\Models\Batch as Model;
use App\Models\BatchCount;
use App\Models\BatchInstallment;
use App\Models\FiscalYear;
use App\Models\TimeSlot;

class BatchServices
{
    public function storeData($requestAll){

        //storing batch count by course and Year
        $time_slot = TimeSlot::findOrFail($requestAll['time_slot_id']);
        $course = $time_slot->course;
        $batch_counts = BatchCount::where('course_id',$course->id)->orderBy('id','desc');
        if($batch_counts->count() > 0){
            $batch_count = BatchCount::firstOrNew(['year' => date('Y'),'course_id' => $course->id]);
            $batch_count->no_of_batch = $batch_counts->first()->no_of_batch +1;
            $batch_count->save();
        }else{
            $batch_count = new BatchCount();
            $batch_count->year = date('Y');
            $batch_count->course_id = $course->id;
            $batch_count->no_of_batch = 1;
            $batch_count->save();
        }
        $setting = new Model();
        $setting->name = $course->code.'-'.$batch_count->year.'-'.$batch_count->no_of_batch;
        $setting->time_slot_id = $requestAll['time_slot_id'];
        $setting->fiscal_year_id  = FiscalYear::where('status',1)->orderBy('id','desc')->first()->id;
        $setting->start_date = $requestAll['start_date'];
        $setting->end_date = $requestAll['end_date'];
        $setting->remark = $requestAll['remark'];
        $setting->status = $requestAll['status'];
        $setting->fee = $requestAll['fee'];
        if($setting->save()){
            if(request('installment_type')){
                $amount_to_pay = 0;
                foreach (request('installment_type') as $index => $value){
                    $batch_installment = BatchInstallment::firstOrNew(['batch_id' => $setting->id,'installment_type' => $value]);
                    $batch_installment->due_date = request('due_date')[$index];
                    $batch_installment->amount = request('amount')[$index];
                    $amount_to_pay = $amount_to_pay + request('amount')[$index];
                    $batch_installment->amount_to_pay= $amount_to_pay;
                    $batch_installment->save();
                }
            }
        }
        return $setting;
    }
    public function updateData($requestAll,$id){

        $setting = Model::findOrFail($id);
        //storing batch count by course and Year
        $time_slot = TimeSlot::findOrFail($requestAll['time_slot_id']);
        $course = $time_slot->course;
        if($setting->time_slot->course_id != $course->id){
            $batch_counts = BatchCount::where('course_id',$course->id)->orderBy('id','desc');
            if($batch_counts->count() > 0){
                $batch_count = BatchCount::firstOrNew(['year' => date('Y'),'course_id' => $course->id]);
                $batch_count->no_of_batch = $batch_counts->first()->no_of_batch +1;
                $batch_count->save();
            }else{
                $batch_count = new BatchCount();
                $batch_count->year = date('Y');
                $batch_count->course_id = $course->id;
                $batch_count->no_of_batch = 1;
                $batch_count->save();
            }
            $setting->name = $course->code.'-'.$batch_count->year.'-'.$batch_count->no_of_batch;
        }
        $setting->time_slot_id = $requestAll['time_slot_id'];
        $setting->fiscal_year_id  = FiscalYear::where('status',1)->orderBy('id','desc')->first()->id;
        $setting->start_date = $requestAll['start_date'];
        $setting->end_date = $requestAll['end_date'];
        $setting->remark = $requestAll['remark'];
        $setting->status = $requestAll['status'];
        $setting->fee = $requestAll['fee'];
        if($setting->save()){
            if(request('installment_type')){
                $amount_to_pay = 0;
                foreach (request('installment_type') as $index => $value){
                    $batch_installment = BatchInstallment::firstOrNew(['batch_id' => $setting->id,'installment_type' => $value]);
                    $batch_installment->due_date = request('due_date')[$index];
                    $batch_installment->amount = request('amount')[$index];
                    $amount_to_pay = $amount_to_pay + request('amount')[$index];
                    $batch_installment->amount_to_pay= $amount_to_pay;
                    $batch_installment->save();
                }
            }
        }
        return $setting;
    }

    public function search()
    {
        $settings = Batch::orderBy('id','desc');
        if(request('name')){
            $key = \request('name');
            $settings = $settings->where('name','like','%'.$key.'%');
        }
        if(request('course_id')){
            $key = \request('course_id');
            $settings = $settings->whereHas('time_slot',function ($q) use($key){
                                $q->where('course_id',$key);
            });
        }
        return $settings->paginate(config('custom.per_page'));
    }
}
