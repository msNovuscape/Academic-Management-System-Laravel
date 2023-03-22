<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalExam\TechnicalExamRequest;
use App\Models\Branch;
use App\Models\Course;
use App\Models\TechnicalExamTimeslot;
use Illuminate\Http\Request;
use App\Services\TechnicalExam\TechnicalExamService;

class TechnicalExamController extends Controller
{
    private $technicalExamService;
    protected $view = 'admin.technical_exam.';

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

    }
}
