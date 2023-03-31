<?php
namespace App\Services;

use App\Models\Course as Model;

class CourseService {

    public function storeData($requestAll)
    {
       $setting = new Model();
       $setting->name = $requestAll['name'];
       $setting->code = $requestAll['code'];
       $setting->remark = $requestAll['remark'];
       $setting->status = $requestAll['status'];
       $setting->save();
       return $setting;
    }

    public function updateData($requestAll,$id)
    {
        $setting = Model::findOrFail($id);
        $setting->name = $requestAll['name'];
        $setting->code = $requestAll['code'];
        $setting->remark = $requestAll['remark'];
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

    public function mySearch()
    {
        $settings = Model::where('id', '!=', 8)->orderBy('id','desc');
        if(request('name')){
            $key = \request('name');
            $settings = $settings->where('name','like','%'.$key.'%')
                ->orWhere('code','like','%'.$key.'%');
        }
        return $settings->paginate(config('custom.per_page'));
    }
}
