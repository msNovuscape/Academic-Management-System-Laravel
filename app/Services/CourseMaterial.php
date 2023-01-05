<?php

namespace App\Services;

use App\Models\CourseMaterial as Model;
use App\Models\CourseMaterialModule;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CourseMaterial
{

    public function storeData($requestAll, $fileName)
    {
        try {
            DB::beginTransaction();
                $setting = new Model();
                $setting->course_id = $requestAll['course_id'];
                $setting->name = $requestAll['name'];
                $setting->type = $requestAll['type'];
                $setting->status = $requestAll['status'];
                $setting->link = $fileName;
                $setting->description = $requestAll['description'];
                $setting->save();
                if (\request('course_module_id')) {
                    $courseMaterialModule = new CourseMaterialModule();
                    $courseMaterialModule->course_material_id = $setting->id;
                    $courseMaterialModule->course_module_id = \request('course_module_id');
                    $courseMaterialModule->status = 1;
                    $courseMaterialModule->save();
                }
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateData($requestAll ,$id)
    {
        try {
            DB::beginTransaction();
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
                if ($setting->course_material_module) {
                    //updating course module
                    if (\request('course_module_id')) {
                        $courseMaterialModule = $setting->course_material_module;
                        $courseMaterialModule->course_material_id = $setting->id;
                        $courseMaterialModule->course_module_id = \request('course_module_id');
                        $courseMaterialModule->status = 1;
                        $courseMaterialModule->save();
                    } else {
                        //delete or deactive course module
                        $courseMaterialModule = $setting->course_material_module;
                        $courseMaterialModule->status = 2;
                        $courseMaterialModule->save();
                    }
                } else {
                    //inserting new course module
                    if (\request('course_module_id')) {
                        $courseMaterialModule = new CourseMaterialModule();
                        $courseMaterialModule->course_material_id = $setting->id;
                        $courseMaterialModule->course_module_id = \request('course_module_id');
                        $courseMaterialModule->status = 1;
                        $courseMaterialModule->save();
                    }
                }
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
