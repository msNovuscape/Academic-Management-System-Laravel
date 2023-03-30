<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalExam\TechnicalExamRequest;
use App\Models\Branch;
use App\Models\Course;
use App\Models\TechnicalExamTimeslot;
use App\Models\TechnicalExam;
use Illuminate\Http\Request;
use App\Services\TechnicalExam\TechnicalExamService;
use Illuminate\Support\Facades\Session;

class TechnicalExamController extends Controller
{
    private $technicalExamService;
    protected $view = 'admin.technical_exam.';
    protected $redirect = 'technical_exams';

    public function __construct(TechnicalExamService $service)
    {
        $this->technicalExamService = $service;
    }

    public function index()
    {
        $settings = $this->technicalExamService->search();
        return view($this->view.'index',compact('settings'));
    }

    public function create(){

        $branches = Branch::where('status',1)->get();
        $timeslots = TechnicalExamTimeslot::where('status',1)->get();
        $courses = Course::where('status',1)->get();
        return view('admin.technical_exam.create',compact('branches','timeslots','courses'));
    }

    public function store(TechnicalExamRequest $request){


        $validatedData = $request->validated();
        $this->technicalExamService->storeData($validatedData);
        Session::flash('success','Technical Exam has been created!');
        return redirect($this->redirect);

    }

    public function view($id){

        $technical_exam = $this->technicalExamService->viewData($id);
        return view($this->view.'show',compact('technical_exam'));


    }
    public function edit($id){

        $technical_exam = $this->technicalExamService->viewData($id);
        return view($this->view.'edit',compact('technical_exam'));


    }

    public function delete($id)
    {
        $setting = TechnicalExam::findOrFail($id);
        // if ($setting->time_slots->count() > 0) {
        //    Session::flash('custom_error', 'The Course has been assigned to Time slot!');
        // }else {
            $setting->delete();
            Session::flash('success', 'Exam has been deleted!');
        // }
        return redirect($this->redirect);
    }
}
