<?php

namespace App\Services;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Session;

class TimeSlotService
{

    public function storeData($requestAll)
    {
      //  dd($requestAll);
        $setting = TimeSlot::where('course_id','=',$requestAll['course_id'])->where('time_table_id','=',$requestAll['time_table_id'])->exists();

     //dd($setting);
        //  $setting = TimeSlot::firstOrNew(['time_table_id' =>$requestAll['time_table_id']]);
        if($setting === false) {
              $setting = new TimeSlot();
            $setting->course_id = $requestAll['course_id'];
            $setting->time_table_id = $requestAll ['time_table_id'];
            $setting->branch_id = $requestAll['branch_id'];
            $setting->status = $requestAll ['status'];


            $setting->save();
            //dd($setting);
            return $setting;
        }else{

            dd("Time Slot Already Exists");
        }

    }

    public function updateData($requestAll ,$id){

        $setting = TimeSlot::findorfail($id);
        //  $setting = TimeSlot::firstOrNew(['time_table_id' =>$requestAll['time_table_id']]);
        $setting->course_id = $requestAll['course_id'];
        $setting->time_table_id = $requestAll ['time_table_id'];
        $setting->branch_id = $requestAll['branch_id'];
        $setting->status = $requestAll ['status'];


        $setting->save();
        return $setting;

    }

    public function search()
    {
        $settings = TimeSlot::orderBy('id','desc');
        if(request('course_id')){
            $key = \request('course_id');
            $settings = $settings->where('course_id',$key);
        }
        if(request('branch_id')){
            $key = \request('branch_id');
            $settings = $settings->where('branch_id',$key);
        }
        if(request('name')){
            $key = \request('name');
            $settings = $settings->whereHas('time_table',function ($q) use ($key){
                                 $q->where('day','like','%'.$key.'%')
                                   ->orWhere('start_time','like','%'.$key.'%')
                                   ->orWhere('end_time','like','%'.$key.'%');
            });
        }
        return $settings->paginate(config('custom.per_page'));
    }
}
