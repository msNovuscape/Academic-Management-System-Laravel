<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchTranfer\BatchTransferRequest;
use App\Models\Batch;
use App\Models\BatchTranfer;
use App\Models\BatchTransfer;
use App\Models\Course;
use App\Services\BatchTransfer\BatchTransferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BatchTransferController extends Controller
{
    protected $view = 'admin.batch_transfer.';
    protected $redirect = 'batch-transfers';
    protected $batchTransferService;

    public function __construct(BatchTransferService $service)
    {
        $this->batchTransferService = $service;
    }

    public function index()
    {
        $courses = Course::where('id', '!=', 8)->get();
        return view($this->view.'index', compact('courses'));
    }

    public function getBatches($courseId)
    {
        $course = Course::findOrFail($courseId);
        $batches = $this->batchTransferService->search($course);
        return view($this->view.'batch.index', compact('batches', 'course'));
    }

    public function getBatchStudents($batchId)
    {
        $batch = Batch::findOrFail($batchId);
        if ($batch->admissions->count() > 0) {
            $transferBatches = Batch::whereHas('time_slot.course', function ($q) use ($batch){
                $q->where('id', $batch->time_slot->course_id);
            })->where('id', '!=', $batch->id)->where('status', 1)->get();
            return view($this->view.'batch.show', compact( 'batch', 'transferBatches'));
        } else {
            Session::flash('success', 'No any students in '. $batch->name);
            return redirect('batch-transfers/batch/'.$batch->id);
        }
    }

    public function postBatchTransfer(BatchTransferRequest $request, $batchId)
    {

        $validatedData = $request->validated();
        $batch = Batch::findOrFail($batchId);
        $validatedData['previous_batch_id'] = $batch->id;
        $this->batchTransferService->storeData($validatedData);
        Session::flash('success', 'Batch has been transferred!');
        return redirect('batch-transfers/course/'.$batch->time_slot->course_id);
    }

}
