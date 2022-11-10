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
use Illuminate\Support\Facades\DB;
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

    public function getGroupAttendance()
    {
        $settings = SCounselling::orderBy('id', 'asc');
        $date = date('Y-m-d');
        $settings = $settings->where('date', '<=', $date)->where('attendance_status', '2')->get();
        $batches = Batch::all();
        return view($this->view.'attendance.index', compact('settings', 'batches', 'date'));
    }

    public function postGroupAttendance()
    {
        $this->validate(\request(),[
            'attendance_date' => 'required|date'
        ]);
        $attendance_data = json_decode(\request('attendance'));
        $attendance_date = \request('attendance_date');
        $this->counsellingService->storeAttendance($attendance_data, $attendance_date);

        $settings = SCounselling::orderBy('id', 'asc');
        $date = date('Y-m-d');
        $settings = $settings->where('date', '<=', $date)->where('attendance_status', '2')->get();
        if(count($settings) > 0){
            $returnHTML = view($this->view.'attendance.result.attendance_table_dom',['settings'=> $settings,'attendance_date' => $attendance_date, 'date' => $date])->render();// or method that you prefere to return data + RENDER is the key here
            return response()->json( array('success' => true,'message' => 'Attendance has been done !', 'html'=>$returnHTML) );
        }else{
            return response()->json( array('success' => false,'message' => 'Please select date in between batch start and end date!') );
        }
    }

    public function singleAttendance(Request $request, $id)
    {
        $this->validate(\request(),[
            'status' => 'required|numeric',
            'symbol' => 'required|string',
        ]);
        $status = $request->status;
        $symbol = $request->symbol;
        $setting = $this->counsellingService->singleAttendance($id,$status,$symbol);
        $returnHTML = view($this->view.'attendance.result.status_button',['setting'=> $setting])->render();// or method that you prefere to return data + RENDER is the key here
        return response()->json( array('success' => true,'data' => $setting,'message' => 'Attendance has been updated ! !', 'html'=>$returnHTML) );
    }

    public function counsellingsAttendanceByDate()
    {
        $settings = SCounselling::orderBy('id', 'asc');
        $date = \request('attendance_date');
        $settings = $settings->where('date', '<=', $date)->where('attendance_status', '2')->get();
        $batches = Batch::all();
        $returnHTML = view($this->view.'attendance.result.attendance_table_dom',['settings'=> $settings,'attendance_date' => $date, 'date' => $date])->render();// or method that you prefere to return data + RENDER is the key here
        return response()->json( array('success' => true,'message' => 'Attendance has been done !', 'html'=>$returnHTML) );

    }

}
