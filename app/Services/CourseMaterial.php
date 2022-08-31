<?php

namespace App\Services;

use App\Models\CourseMaterial as Model;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;


class CourseMaterial
{

    public function storeData($requestAll ,$fileName)
    {
        $setting = new Model();
        $setting->course_id = $requestAll['course_id'];
        $setting->name = $requestAll['name'];
        $setting->type = $requestAll['type'];
        $setting->status = $requestAll['status'];
        $setting->link = $fileName;
        $setting->description = $requestAll['description'];
        $setting->save();
        return $setting;
    }

    public function updateData($requestAll ,$id)
    {
        $setting = Model::findOrFail($id);
        if(\request()->hasFile('link')){
            $directory = SettingService::makeDirectory(array_search('course_material',config('custom.image_folders')));
            $extension = \request()->file('link')->getClientOriginalExtension();
            $file_name = md5(rand(111,9999).Auth::user()->id).'.'.$extension;
            $path = $directory.$file_name;
            \request('link')->move($directory,$file_name);
            if($setting->type == 1){
                if(is_file(public_path().'/'.$setting->link) && file_exists(public_path().'/'.$setting->link)){
                    unlink(public_path().'/'.$setting->link);
                }
            }
            $setting->link = $path;
        }else{
            if($setting->type == 1){
                if(is_file(public_path().'/'.$setting->link) && file_exists(public_path().'/'.$setting->link)){
                    unlink(public_path().'/'.$setting->link);
                }
            }
            $setting->link = $requestAll['link'];
        }
        $setting->course_id = $requestAll['course_id'];
        $setting->name = $requestAll['name'];
        $setting->type = $requestAll['type'];
        $setting->status = $requestAll['status'];
        $setting->update();
        return $setting;
    }
}
