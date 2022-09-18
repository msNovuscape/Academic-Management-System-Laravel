<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quiz\QuizIndiviualRequest;
use App\Models\Admission;
use App\Models\Course;
use App\Models\QuizBatch;
use App\Models\QuizIndiviual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuizIndiviualController extends Controller
{

    protected $view = 'admin.quiz_individual.';
    protected $redirect = 'quiz_individual';

    public function index()
    {
        if(\request('name')){
            $key = \request('name');
           $admissions = Admission::whereHas('user',function ($u) use ($key){
                                $u->where('name','like','%'.$key.'%');
                    })->whereHas('batch',function ($q){
                        $q->where('status',1);
           })->get();
        }
//        where('name','like','%'.$key.'%');
        $settings = QuizIndiviual::orderBy('id','desc')->paginate(config('custom.per_page'));
        if(isset($admissions)){
            return view($this->view.'index',compact('settings','admissions'));
        }else{
            return view($this->view.'index',compact('settings'));
        }

    }


    public function create($admission_id)
    {
        $admission = Admission::findOrFail($admission_id);
        $courses = Course::where('status',1)->get();
        return view($this->view.'create',compact('courses','admission'));
    }

    public function getBatch($course_id)
    {
        $course = Course::findOrFail($course_id);
        $quizzes = $course->quizzes->where('status',1);
        $quizzesHtml = view($this->view.'quiz_dom',['quizzes' => $quizzes])->render();
        return response()->json(array('success' =>true, 'quiz_html' => $quizzesHtml));
    }

    public function store(QuizIndiviualRequest $request)
    {
        $validatedData = $request->validated();
        $admission = Admission::findOrFail(\request('admission_id'));
        $check = QuizBatch::where('quiz_id',\request('quiz_id'))->where('batch_id',$admission->batch_id)->get();
        if(count($check) > 0){
            Session::flash('custom_success','Quiz has been already assigned to respective '.$admission->user->name.' in Batch');
        }else{
            $setting = QuizIndiviual::firstOrNew(['quiz_id' => \request('quiz_id'),'admission_id' => \request('admission_id')]);
            $setting->user_id = Auth::user()->id;
            $setting->status = \request('status');
            $setting->save();
            Session::flash('success','Quiz has been assigned individually!');
        }
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = QuizIndiviual::findOrFail($id);
        $courses = Course::where('status',1)->get();
        $course = Course::findOrFail($setting->admission->batch->time_slot->course_id);
        $batches = $course->batches;
        return view($this->view.'edit',compact('setting','batches','courses'));
    }

    public function update(QuizIndiviualRequest $request,$id)
    {
        $validatedData = $request->validated();
        $setting = QuizIndiviual::findOrFail($id);
        $check = QuizBatch::where('quiz_id',\request('quiz_id'))->where('batch_id',$setting->admission->batch_id)->get();
        if(count($check) > 0){
            Session::flash('custom_success','Quiz has been already assigned to respective '.$admission->user->name.' in Batch');
        }else {
            $setting->quiz_id = \request('quiz_id');
            $setting->status = \request('status');
            $setting->user_id = Auth::user()->id;
            $setting->save();
            Session::flash('success', 'Quiz has been assigned to individual has updated!');
        }
        return redirect($this->redirect);
    }
}
