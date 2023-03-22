<?php
namespace App\Services\TechnicalExam;

use App\Models\TechnicalExamLocation as Model;

class TechnicalExamLocationService {

    public function storeData($requestAll)
    {
       $setting = new Model();
       $setting->city_name = $requestAll['city_name'];
       $setting->address = $requestAll['address'];
       $setting->status = $requestAll['status'];
       $setting->save();
       return $setting;
    }

    public function updateData($requestAll,$id)
    {
        $setting = Model::findOrFail($id);
        $setting->city_name = $requestAll['city_name'];
        $setting->address = $requestAll['address'];
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
