<?php

namespace App\Services;

use App\Http\Controllers\Admin\BatchCourseMaterialController;
use App\Models\Admission;
use App\Models\AdmissionBatchMaterial;
use App\Models\Batch;
use App\Models\CourseModule;
use App\Models\TransferBatchMaterial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\BatchCourseMaterial as Model;
use Exception;

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
            try {
                DB::beginTransaction();
                    foreach ($requestAll['course_material_id'] as $value) {
                        $user = Model::firstOrNew(['batch_id' => request('batch_id'),'course_material_id' => $value]);
                        $user->save();
                    }
                DB::commit();
                return $user;
            } catch (Exception $e) {
                DB::rollBack();
                throw $e;
            }

        } elseif (request('admissionId') || request('transferAdmissionId')) {
            try {
                DB::beginTransaction();
                    if (request('admissionId')) {
                        foreach (request('admissionId') as $admissionId) {
                            $admissionBatchMaterial = AdmissionBatchMaterial::firstOrNew(['course_module_id' => request('course_module_id'),
                                'admission_id' => $admissionId]);
                            $admissionBatchMaterial->batch_id = request('batch_id');
                            $admissionBatchMaterial->save();
                        }
                    }
                    if (request('transferAdmissionId')) {
                        foreach (request('transferAdmissionId') as $transferAdmissionId) {
                            $admission = Admission::findOrFail($transferAdmissionId);
                            $transferBatchMaterial = TransferBatchMaterial::firstOrNew(['course_module_id' => request('course_module_id'),
                                'admission_id' => $admission->id]);
                            $transferBatchMaterial->batch_id = request('batch_id');
                            $transferBatchMaterial->batch_transfer_id = $admission->activeBatchTransfer->first()->id;
                            $transferBatchMaterial->save();
                        }
                    }
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw $e;
            }


        }
    }

    public function updateData($requestAll, $batch_id)
    {
        if (request('course_material_id')) {
            try {
                DB::beginTransaction();
                    $batch = Batch::findOrFail($batch_id);
                    $batch->batch_course_materials()->delete();
                    foreach ($requestAll['course_material_id'] as $value) {
                        $user = Model::firstOrNew(['batch_id' => request('batch_id'),'course_material_id' => $value]);
                        $user->save();
                    }
                DB::commit();
                return $user;
            } catch (Exception $e) {
                DB::rollBack();
                throw $e;
            }

        } elseif (request('admissionId') || request('transferAdmissionId')) {
            try {
                DB::beginTransaction();
                    $courseModule = CourseModule::findOrFail(request('course_module_id'));
                    $batch = Batch::findOrFail($batch_id);
                    if ($courseModule->admission_batch_materials->where('batch_id', $batch->id)->count() > 0) {
                        $courseModule->admission_batch_materials()->where('batch_id', $batch->id)->delete();
                    }
                    if ($courseModule->transfer_batch_materials->where('batch_id', $batch->id)->count() > 0) {
                        $courseModule->transfer_batch_materials()->where('batch_id', $batch->id)->delete();
                    }
                    if (request('admissionId')) {
                        foreach (request('admissionId') as $admissionId) {
                            $admissionBatchMaterial = AdmissionBatchMaterial::firstOrNew(['course_module_id' => request('course_module_id'),
                                'admission_id' => $admissionId]);
                            $admissionBatchMaterial->batch_id = request('batch_id');
                            $admissionBatchMaterial->save();
                        }
                    }
                    if (request('transferAdmissionId')) {
                        foreach (request('transferAdmissionId') as $transferAdmissionId) {
                            $admission = Admission::findOrFail($transferAdmissionId);
                            $transferBatchMaterial = TransferBatchMaterial::firstOrNew(['course_module_id' => request('course_module_id'),
                                'admission_id' => $admission->id]);
                            $transferBatchMaterial->batch_id = request('batch_id');
                            $transferBatchMaterial->batch_transfer_id = $admission->activeBatchTransfer->first()->id;
                            $transferBatchMaterial->save();
                        }
                    }
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                throw $e;
            }


        } else {
            if(request('batch_id') && request('course_module_id')) {
                $batch = Batch::findOrFail($batch_id);
                $courseModule = CourseModule::findOrFail(request('course_module_id'));
                if ($courseModule->admission_batch_materials->where('batch_id', $batch->id)->count() > 0) {
                    $courseModule->admission_batch_materials()->where('batch_id', $batch->id)->delete();
                }
                if ($courseModule->transfer_batch_materials->where('batch_id', $batch->id)->count() > 0) {
                    $courseModule->transfer_batch_materials()->where('batch_id', $batch->id)->delete();
                }
            } elseif (request('batch_id')) {
                $batch = Batch::findOrFail($batch_id);
                $batch->batch_course_materials()->delete();
            }
        }
    }
}
