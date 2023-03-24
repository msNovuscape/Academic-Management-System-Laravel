<?php

namespace App\Services\BatchTransfer;

use App\Models\Batch;
use Exception;
use Illuminate\Support\Facades\DB;

class BatchTransferService
{
    public function storeData($validatedData)
    {
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

