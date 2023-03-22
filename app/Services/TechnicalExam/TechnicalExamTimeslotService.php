<?php
namespace App\Services\TechnicalExam;

use App\Models\TechnicalExamTimeslot as Model;

class TechnicalExamTimeslotService {

    public function storeData($requestAll)
    {
       $setting = new Model();
       $setting->start_time = $requestAll['start_time'];
       $setting->end_time = $requestAll['end_time'];
       $setting->status = $requestAll['status'];
       $setting->save();
       return $setting;
    }

    public function updateData($requestAll,$id)
    {
        $setting = Model::findOrFail($id);
        $setting->start_time = $requestAll['start_time'];
       $setting->end_time = $requestAll['end_time'];
        $setting->status = $requestAll['status'];
        $setting->save();
        return $setting;
    }

    public function search()
    {
        $settings = Model::orderBy('id','desc');
        if(request('name')){
            $key = \request('name');
            $settings = $settings->where('name','like','%'.$key.'%')
                                ->orWhere('code','like','%'.$key.'%');
        }
        return $settings->paginate(config('custom.per_page'));
    }
}
