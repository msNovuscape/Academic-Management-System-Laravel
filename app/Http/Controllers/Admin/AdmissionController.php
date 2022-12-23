<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionRequest;
use App\Http\Requests\AdmissionUpdateRequest;
use App\Jobs\SendAdmissionEmailJob;
use App\Mail\AdmissionEmail;
use App\Models\Admission;
use App\Models\Admission as Model;
use App\Models\Batch;
use App\Models\Course;
use App\Models\StudentQuizBatch;
use App\Models\TimeSlot;
use App\Services\AdmissionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Time;

class AdmissionController extends Controller
{
    protected $view = 'admin.admission.';
    protected $redirect = 'admissions';
    private $admissionService;

    public function __construct(AdmissionService $service)
    {
        $this->admissionService = $service;
    }

    public function index()
    {
        $courses = Course::where('status',1)->orderBy('id','desc')->get();
        $batches = Batch::where('status',1)->orderBy('id','desc')->get();
        $settings = $this->admissionService->search();
        return view($this->view.'index',compact('settings','courses','batches'));
    }

    public function create()
    {
        $courses = Course::where('status',1)->get();
        return view($this->view.'create',compact('courses'));
    }

    public function getBatch($course_id)
    {
        $course = Course::findOrFail($course_id);
        $settings = $course->batches->where('end_date','>=',date('Y-m-d'))->where('status',array_search('Active',config('custom.status')));
        $returnHtml = view($this->view.'batch_dom',['settings' => $settings])->render();
        return response()->json(array('success' =>true, 'html' => $returnHtml));
    }
    public function getBatchInfo($batch_id)
    {
        $batch = Batch::findOrFail($batch_id);
        $firstInstallmentAmount = $batch->batch_installments[0]['amount'];
        return response()->json(array('success' =>true, 'batch' => $batch , 'firstInstallmentAmount' => $firstInstallmentAmount));
    }

    public function getBatchCalender($batch_id)
    {
        $batch = Batch::findOrFail($batch_id);
        return response()->json(['batch' => $batch],200);
    }

    public function store(AdmissionRequest $request)
    {
        $validatedData = $request->validated();
        $admission = $this->admissionService->storeData($validatedData);
        Mail::to(request('email'))->send(new AdmissionEmail($admission));
//        Mail::to('swadesh.chaudhary@gmail.com')->send(new AdmissionEmail($admission));
//        dispatch(new SendAdmissionEmailJob($admission));
        $this->admissionService->storeAdmissionEmailInfo($admission);
        Session::flash('success', 'Student  has been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = Admission::findOrFail($id);
        $courses = Course::where('status',1)->get();
        $time_slot = TimeSlot::where('status', 1)->get();
        $course = Course::findOrFail($setting->batch->time_slot->course_id);
        $batches = $course->batches->where('end_date','>=',date('Y-m-d'))->where('status',array_search('Active',config('custom.status')));
        return view($this->view.'edit',compact('courses','setting','time_slot','batches'));
    }

    public function update(AdmissionUpdateRequest $request, $id)
    {

       // dd($request);
        $validatedData = $request->validated();
        //dd($validatedData);
        $admission = $this->admissionService->updateData($validatedData,$id);
        Mail::to(request('email'))->send(new AdmissionEmail($admission));
        $this->admissionService->storeAdmissionEmailInfo($admission);
        Session::flash('success', 'Admission has been updated!');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $setting = Admission::findOrFail($id);
        $courses = Course::where('status', 1)->get();
        $time_slot = TimeSlot::where('status', 1)->get();
        $course = Course::findOrFail($setting->batch->time_slot->course_id);
        $batches = $course->batches->where('end_date','>=',date('Y-m-d'))->where('status',array_search('Active',config('custom.status')));
        return view($this->view.'show', compact('courses','setting','time_slot','batches'));
    }

    public function admissionEmail($id)
    {
        $admission = Admission::findOrFail($id);
        Mail::to($admission->user->email)->send(new AdmissionEmail($admission));
        $this->admissionService->storeAdmissionEmailInfo($admission);
        Session::flash('success', 'Email has been sent!');
        return redirect($this->redirect);
    }

    public function getStudentDetail($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        $finances = $setting->finances;
        $attendances = $setting->student->attendances;
        $presentCount = $attendances->where('status', 1)->count();
        $absentCount = $attendances->where('status', 2)->count();
        $quizBatches = $setting->batch->quiz_batches;
//        dd($setting->batch->quiz_batches[0]->student_quiz_batches);
        return view('admin.student_detail_view.index', compact('setting',
            'finances', 'attendances', 'presentCount', 'absentCount', 'quizBatches'));
    }

}
