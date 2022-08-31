<?php

namespace App\Services;

use App\Models\TimeTable;

class TimeTableService
{
    public function storeData($requestAll)
    {
        $setting = new TimeTable();
        $setting->day = $requestAll['day'];
        $setting->start_time = $requestAll['start_time'];
        $setting->end_time = $requestAll['end_time'];
        $setting->status = $requestAll['status'];
        $setting->save();
        return $setting;
    }

    public function updateData($requestAll,$id)
    {
        $setting = TimeTable::findOrFail($id);
        $setting->day = $requestAll['day'];
        $setting->start_time = $requestAll['start_time'];
        $setting->end_time = $requestAll['end_time'];
        $setting->status = $requestAll['status'];
        $setting->save();
        return $setting;
    }
    public function search()
    {
        $settings = TimeTable::orderBy('id','desc');
        if(request('name')){
            $key = \request('name');
            $settings = $settings->where('day','like','%'.$key.'%')
                ->orWhere('start_time','like','%'.$key.'%')
                ->orWhere('end_time','like','%'.$key.'%');
        }
        return $settings->paginate(config('custom.per_page'));
    }


}
