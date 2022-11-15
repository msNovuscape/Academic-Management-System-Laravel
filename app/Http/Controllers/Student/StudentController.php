<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\EnrollmentRequest;
use App\Http\Requests\Student\NewPassword;
use App\Http\Requests\Student\UpdateEnrollmentReqest;
use App\Models\Batch;
use App\Models\Country;
use App\Models\CourseMaterial;
use App\Models\Student;
use App\Models\Student as Model;
use App\Models\StudentQuizBatch;
use App\Models\StudentQuizIndividual;
use App\Services\Quiz\QuizBatchService;
use App\Services\Quiz\QuizIndividualService;
use App\Services\Student\EnrollmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    protected $view = 'student.';
    protected $redirect = 'student/';


    private $enrollmentService;

    public function __construct(EnrollmentService $service)
    {
        $this->enrollmentService = $service;
    }


    public function index()
    {
        if (Auth::user()->student) {
            $setting = Auth::user()->student;
            $countries = Country::all();
            $studentQuizBatches = StudentQuizBatch::doesntHave('batch_quiz_result')->where('admission_id', Auth::user()->admission->id)->get();
            $studentQuizIndividuals = StudentQuizIndividual::doesntHave('individual_quiz_result')->where('admission_id', Auth::user()->admission->id)->get();
            if ($studentQuizBatches->count() > 0) {
                foreach ($studentQuizBatches as $studentQuizBatch) {
                    $quizBatchService = new QuizBatchService();
                    $quizBatchService->quizBatchResultStudent($studentQuizBatch);
                }
            }
            if ($studentQuizIndividuals->count() > 0) {
                foreach ($studentQuizIndividuals as $studentQuizIndividual) {
		    $studentQuizIndividual = new QuizIndividualService();
                    $studentQuizIndividual->quizIndividualResultStudent($studentQuizIndividual);
                }
            }
            return view($this->view.'index', compact('setting', 'countries'));
        } else {
            return redirect('');
        }

    }

    public function update(UpdateEnrollmentReqest $request,$id)
    {
        $validatedData = $request->validated();
        $student = $this->enrollmentService->updateData($validatedData,$id);
        Session::flash('success','Dear '.$student->admission->user->name.', your information is successfully updated !');
        return redirect('student');
    }

    public function getNewPassword()
    {
       return view($this->view.'enrollment.change_password');
    }

    public function postNewPassword(NewPassword $request)
    {
        $validatedData = $request->validated();
        $this->enrollmentService->newPassword($validatedData);
        return redirect($this->redirect.'enrollments');
    }


    public function getEnroll()
    {
        if(!Auth::user()->student){
            $countries = Country::all();
            $course_name = Auth::user()->admission->batch->time_slot->course->name;
            return view($this->view.'enrollment.enrollment',compact('countries','course_name'));
        }else{
            return redirect('');
        }
    }

    public function postEnroll(EnrollmentRequest $request)
    {
        $validatedData = $request->validated();
        $this->enrollmentService->storeData($validatedData);
        Session::flash('success','Successfully enrolled!');
        return redirect('student');
    }

    public function getStudents()
    {
       $settings = Model::paginate(config('custom.per_page'));
       return view($this->view.'index1',compact('settings'));
    }

    public function show($id)
    {
        $setting = Model::findOrFail($id);
        $countries = Country::all();
        return view($this->view.'show',compact('setting','countries'));
    }

    public function getTests()
    {
        $countries = Country::all();
        return view($this->view.'test',compact('countries'));
    }


    public function getScore(){
        return view($this->view.'score');
    }

    public function getMaterial()
    {
        $settings = $this->enrollmentService->getMaterials();
        return view('student.material.index',compact('settings'));
    }

}
