<?php

namespace App\Services\BatchTransfer;

use App\Models\Batch;
use App\Models\BatchTranfer;
use Exception;
use Illuminate\Support\Facades\DB;

class BatchTransferService
{
    public function storeData($validatedData, $batch)
    {
        try {
            DB::beginTransaction();
            if (array_key_exists('admissionId', $validatedData)) {
                foreach ($validatedData['admissionId'] as $reqAdmissionId) {
                    $setting = new BatchTranfer();

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

