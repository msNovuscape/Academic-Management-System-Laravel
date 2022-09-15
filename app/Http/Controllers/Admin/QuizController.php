<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\QuizRequest;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{

    protected $view = 'admin.quiz.';
    protected $redirect = 'quiz';

    public function index()
    {
         $settings = Quiz::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
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


}
