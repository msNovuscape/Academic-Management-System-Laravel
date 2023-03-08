<?php

namespace App\Services;

use App\Http\Controllers\Admin\BatchCourseMaterialController;
use App\Models\AdmissionBatchMaterial;
use App\Models\Batch;
use App\Models\CourseModule;
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
        return $settings->whereHas('batch_course_materials')->orWhereHas('admission_batch_materials')->paginate(config('custom.per_page'));
    }
    public function storeData($requestAll)
    {
        if (request('course_material_id')) {
            foreach ($requestAll['course_material_id'] as $value) {
                $user = Model::firstOrNew(['batch_id' => request('batch_id'),'course_material_id' => $value]);
                $user->save();
            }
            return $user;
        } elseif (request('admissionId')) {
                foreach (request('admissionId') as $admissionId) {
                    $admissionBatchMaterial = AdmissionBatchMaterial::firstOrNew(['course_module_id' => request('course_module_id'),
                        'admission_id' => $admissionId]);
                    $admissionBatchMaterial->batch_id = request('batch_id');
                    $admissionBatchMaterial->save();
                }
                return $admissionBatchMaterial;
        }
    }

    public function updateData($requestAll ,$batch_id )
    {
        if (request('course_material_id')) {
            $batch = Batch::findOrFail($batch_id);
            $batch->batch_course_materials()->delete();
            foreach ($requestAll['course_material_id'] as $value) {
                $user = Model::firstOrNew(['batch_id' => request('batch_id'),'course_material_id' => $value]);
                $user->save();
            }
            return $user;
        } elseif (request('admissionId')) {
            $courseModule = CourseModule::findOrFail(request('course_module_id'));
            $batch = Batch::findOrFail($batch_id);
            if ($courseModule->admission_batch_materials->where('batch_id', $batch->id)->count() > 0) {
//                $courseModule->admission_batch_materials()->delete();
                $courseModule->admission_batch_materials()->where('batch_id', $batch->id)->delete();
            }
            foreach (request('admissionId') as $admissionId) {
                $admissionBatchMaterial = AdmissionBatchMaterial::firstOrNew(['course_module_id' => request('course_module_id'),
                    'admission_id' => $admissionId]);
                $admissionBatchMaterial->batch_id = request('batch_id');
                $admissionBatchMaterial->save();
            }
            return $admissionBatchMaterial;
        } else {
            if(request('batch_id') && request('course_module_id')) {
                $batch = Batch::findOrFail($batch_id);
                $courseModule = CourseModule::findOrFail(request('course_module_id'));
                if ($courseModule->admission_batch_materials->where('batch_id', $batch->id)->count() > 0) {
                    $courseModule->admission_batch_materials()->where('batch_id', $batch->id)->delete();
                }
            } elseif (request('batch_id')) {
                $batch = Batch::findOrFail($batch_id);
                $batch->batch_course_materials()->delete();
            }
        }
    }
}
