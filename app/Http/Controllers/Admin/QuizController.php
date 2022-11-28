<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\QuizRequest;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Symfony\Component\VarDumper\Dumper\esc;

class QuizController extends Controller
{

    protected $view = 'admin.quiz.';
    protected $redirect = 'quiz';

    public function index()
    {
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            $settings = Quiz::whereHas('course.activeUserTeachers', function ($t) {
                $t->where('user_id', Auth::user()->id);
            });
        } else {
            $settings = Quiz::orderBy('id', 'desc');
        }

        if(request('name')){
            $key = \request('name');
            $settings = $settings->where('name','like','%'.$key.'%');
        }
        if(request('course_id')){
            $key = \request('course_id');
            $settings = $settings->where('course_id',$key);
        }
         $settings = $settings->paginate(config('custom.per_page'));
         $courses = Course::whereHas('quizzes')->orderBy('id','DESC')->get();
        return view($this->view.'index',compact('settings','courses'));
    }

    public function create()
    {
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            //for tutor
            $courses = Course::whereHas('activeUserTeachers', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->where('status', 1)->get();
        } else {
            $courses = Course::where('status', 1)->get();
        }
        return view($this->view.'create',compact('courses'));
    }

    public function store(QuizRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['created_by'] = Auth::user()->id;
        Quiz::create($validatedData);
        Session::flash('success','Quiz  has been created!');
        return redirect($this->redirect);

    }

    public function edit($id)
    {
        $setting = Quiz::findOrFail($id);
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            //for tutor
            $courses = Course::whereHas('activeUserTeachers', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->where('status', 1)->get();
        } else {
            $courses = Course::where('status', 1)->get();
        }
        return view($this->view.'edit',compact('setting','courses'));
    }

    public function update(QuizRequest $request,$id)
    {
        $setting = Quiz::findOrFail($id);
        $validatedData = $request->validated();
        $setting->created_by  = Auth::user()->id;
        if($setting->quiz_batch || $setting->quiz_individual){

        }else{
            $setting->course_id  = $validatedData['course_id'];
        }
        $setting->name  = $validatedData['name'];
        $setting->time_period  = $validatedData['time_period'];
        $setting->status  = $validatedData['status'];
        $setting->date  = $validatedData['date'];
        $setting->remark  = $validatedData['remark'];
        $setting->save();
        Session::flash('success','Quiz  has been updated!');
        return redirect($this->redirect);
    }

    public function showAll($id)
    {
        $quiz = Quiz::findOrFail($id);
        $settings = QuizQuestion::where('quiz_id',$quiz->id)->orderBy('id','asc');
        $settings = $settings->paginate(2);
        return view($this->view.'show_all_question',compact('settings'));
    }

    public function delete($id)
    {
        $setting = Quiz::findOrFail($id);
        if($setting->quiz_batch || $setting->quiz_individual){
            $message = 'You can not delete quiz!';
        }else{
            foreach ($setting->QuizQuestions as $quizQuestion){
                $quizQuestion->quiz_question_answers()->delete();
                $quizQuestion->quiz_options()->delete();
                if($quizQuestion->quiz_question_image){
                    $image_path = public_path().'/'.$quizQuestion->quiz_question_image->image;
                    if(file_exists($image_path) && is_file($image_path)){
                        unlink($image_path);
                    }
                    $quizQuestion->quiz_question_image->delete();
                }
            }
            $setting->QuizQuestions()->delete();
            $setting->delete();
            $message = 'Quiz  has been deleted!';
        }
        Session::flash('success', $message);
        return redirect($this->redirect);
    }


}
