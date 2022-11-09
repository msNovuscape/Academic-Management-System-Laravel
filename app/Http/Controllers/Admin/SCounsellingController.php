<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Counselling\CounsellingAttendanceRequest;
use App\Http\Requests\Counselling\CounsellingRequest;
use App\Models\Admission;
use App\Models\Batch;
use App\Models\Course;
use App\Models\SCounselling;
use App\Services\Counselling\CounsellingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SCounsellingController extends Controller
{
    protected $view = 'admin.counselling.';
    protected $viewStudent = 'admin.counselling.student.';
    protected $redirect = 'counselling';
    private $counsellingService;

    public function __construct(CounsellingService $service)
    {
        $this->counsellingService = $service;
    }

    public function index()
    {
        $courses = Course::all();
        $batches = Batch::all();
        $settings = $this->counsellingService->search();
        return view('admin.counselling.index', compact('settings', 'courses', 'batches'));
    }

    public function getCounselling($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
//        dd($setting->sCounselling->studentCounsellingStatuses->where('status',1));
        return view($this->viewStudent.'index', compact('setting'));
    }

    public function postStatus(CounsellingRequest $request, $admissionId)
    {
        $admission = Admission::findOrFail($admissionId);
        $request->validated();
        $this->counsellingService->storeData($admission);
        Session::flash('success', 'Status  has been created!');
        return redirect($this->redirect.'/'.$admissionId);
    }

    public function postAttendance(CounsellingAttendanceRequest $request, $admissionId)
    {
        $admission = Admission::findOrFail($admissionId);
        $request->validated();
        $this->counsellingService->attendance($admission->sCounselling);
        Session::flash('success', 'Counselling status  has been created!');
        return redirect($this->redirect.'/'.$admissionId);
    }

    public function counselling_test()
    {
       dd(\request('comment')[1]);
    }

    public function store(CounsellingRequest $request)
    {
        $validatedData = $request->validated();
        $this->counsellingService->storeData($validatedData);
        Session::flash('success', 'Carrier Counselling is added!');
        return redirect($this->redirect);
    }

    public function attendance(CounsellingAttendanceRequest $request, $studentCounsellingId)
    {
        $studentCounselling = SCounselling::findOrFail($studentCounsellingId);
        $this->counsellingService->attendance($studentCounselling);
        Session::flash('success', 'Carrier Counselling Attendance is created!');
        return redirect($this->redirect);
    }

}
