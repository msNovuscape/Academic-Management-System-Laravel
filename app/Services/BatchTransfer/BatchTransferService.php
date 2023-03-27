<?php

namespace App\Services\BatchTransfer;

use App\Models\Batch;
use App\Models\BatchTranfer;
use App\Models\BatchTransfer;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BatchTransferService
{
    public function storeData($validatedData)
    {
        try {
            DB::beginTransaction();
            if (array_key_exists('admissionId', $validatedData)) {
                foreach ($validatedData['admissionId'] as $reqAdmissionId) {
                    //checking the information that it has previously batch transfer or not
                    $batchTransfers = BatchTransfer::where('admission_id', $reqAdmissionId)->orderBy('id', 'desc');

                    if ($batchTransfers->count() > 0) {
                        //if batch transfer then make previous data status 2 i.e. deactive
                        $batchTransfers->update(['status' => 2]);
                        $validatedData['previous_batch_id'] = $batchTransfers->first()->batch_id;
                    }
                    $setting = new BatchTransfer();
                    $setting->created_by = Auth::user()->id;
                    $setting->batch_id = $validatedData['transfer_batch_id'];
                    $setting->previous_batch_id = $validatedData['previous_batch_id'];
                    $setting->admission_id = $reqAdmissionId;
                    $setting->date = date('Y-m-d');
                    $setting->status = 1;
                    $setting->save();
                    $setting->admission->batch_transfer_status = 1;
                    $setting->admission->save();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function search($course)
    {
        $settings = Batch::whereHas('time_slot.course', function ($q) use ($course) {
            $q->where('id', $course->id);
        })->orderBy('id', 'desc');

        if (request('name')) {
            $key = \request('name');
            $settings = $settings->where('name_other', 'like', '%'.$key.'%');

        }
        $settings = $settings->paginate(config('custom.per_page'));
        return $settings;
    }

}

