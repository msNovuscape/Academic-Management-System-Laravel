<?php

namespace App\Services;

use App\Http\Controllers\Admin\BatchCourseMaterialController;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\BatchCourseMaterial as Model;

class BatchCourseMaterial
{

    public function search()
    {
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            $settings = Batch::whereHas('activeUserTeachersBatch', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->where('status', '1')->orderBy('id','desc');
        } else {
            $settings = Batch::orderBy('id','desc');
        }

        if(request('name')){
            $key = \request('name');
            $settings = $settings->whereHas('batch_course_materials',function ($q) use ($key){
                                $q->whereHas('courseMaterial',function ($cm) use ($key){
                                    $cm->whereHas('course',function ($cur) use($key){
                                        $cur->where('name','like','%'.$key.'%');
                                    });
                                });
                        })->orWhere('name','like','%'.$key.'%');
        }
        return $settings->whereHas('batch_course_materials')->paginate(config('custom.per_page'));
    }
    public function storeData($requestAll)
    {
        if(count($requestAll['course_material_id']) > 0){
            foreach ($requestAll['course_material_id'] as $value){
                $user = Model::firstOrNew(['batch_id' => request('batch_id'),'course_material_id' => $value]);
                $user->save();
            }
            return $user;
        }
    }

    public function updateData($requestAll ,$batch_id )
    {
        if(count($requestAll['course_material_id']) > 0){
            $batch = Batch::findOrFail($batch_id);
            $batch->batch_course_materials()->delete();
            foreach ($requestAll['course_material_id'] as $value){
                $user = Model::firstOrNew(['batch_id' => request('batch_id'),'course_material_id' => $value]);
                $user->save();
            }
            return $user;
        }
    }
}
