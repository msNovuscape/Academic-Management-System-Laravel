<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionRequest;
use App\Mail\AdmissionEmail;
use App\Models\Admission;
use App\Models\Admission as Model;
use App\Models\Batch;
use App\Models\Course;
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
        $settings = Model::orderBy('id','desc')->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
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
        Session::flash('success','Student  has been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = Admission::findorfail($id);
        $courses = Course::where('status',1)->get();
        $time_slot = TimeSlot::where('status', 1)->get();
        $course = Course::findOrFail($setting->batch->time_slot->course_id);
        $batches = $course->batches->where('end_date','>=',date('Y-m-d'))->where('status',array_search('Active',config('custom.status')));
        return view($this->view.'edit',compact('courses','setting','time_slot','batches'));
    }

    public function update(AdmissionRequest $request, $id)
    {

       // dd($request);
        $validatedData = $request->validated();
        //dd($validatedData);
        $this->admissionService->updateData($validatedData,$id);
        Session::flash('success','Admission has been updated!');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $setting = Admission::findorfail($id);
        $courses = Course::where('status',1)->get();
        $time_slot = TimeSlot::where('status', 1)->get();
        $course = Course::findOrFail($setting->batch->time_slot->course_id);
        $batches = $course->batches->where('end_date','>=',date('Y-m-d'))->where('status',array_search('Active',config('custom.status')));
        return view($this->view.'show',compact('courses','setting','time_slot','batches'));
    }
}
