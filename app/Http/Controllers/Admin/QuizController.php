<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\QuizRequest;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{

    protected $view = 'admin.quiz.';
    protected $redirect = 'quiz';

    public function index()
    {
        $settings = Quiz::orderBy('id','DESC');
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
        $courses = Course::where('status',1)->get();
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

    public function showAll($id)
    {

        $quiz = Quiz::findOrFail($id);
        $settings = QuizQuestion::where('quiz_id',$quiz->id)->orderBy('id','asc');
        $settings = $settings->paginate(2);
        return view($this->view.'show_all_question',compact('settings'));
    }


}
