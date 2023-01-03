<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseModuleRequest;
use App\Models\Course;
use App\Models\CourseModule;
use App\Services\CourseModuleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseModuleController extends Controller
{
    protected $view = 'admin.course_module.';
    protected $redirect = 'course-modules';
    protected $courseModule;

    public function __construct(CourseModuleService $service)
    {
        $this->courseModule = $service;
    }

    public function index()
    {
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            $settings = CourseModule::whereHas('course.activeUserTeachers', function ($t) {
                $t->where('user_id', Auth::user()->id);
            });
        } else {
            $settings = CourseModule::orderBy('id', 'desc');
        }

        if(\request('name')){
            $key = \request('name');
            $settings = $settings->whereHas('course',function ($q) use($key){
                $q->where('name','like','%'.$key.'%');
            })->orWhere('name','like','%'.$key.'%');
        }
        $settings = $settings->paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
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

    public function store(CourseModuleRequest $request)
    {
        $validateData = $request->validated();
        $this->courseModule->storeData($validateData);
        Session::flash('success', 'Course Module has been created!');
        return redirect($this->redirect);
    }

    public function edit($course_id)
    {
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            //for tutor
            $courses = Course::whereHas('activeUserTeachers', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->where('status', 1)->get();
        } else {
            $courses = Course::where('status', 1)->get();
        }
        $setting = Course::findOrFail($course_id);
        return view($this->view.'edit', compact('setting', 'courses'));

    }

    public function update()
    {
        $validateData =  $this->validate(\request(), [
            'course_id' => 'required|numeric',
            'name_old' => 'nullable|array',
            'name' => 'nullable|array',
        ]);
        $this->courseModule->updateData($validateData);
        Session::flash('success', 'Course Module has been created!');
        return redirect($this->redirect);
    }

    public function delete()
    {
        $this->validate(\request(), [
            'course_module_id' => 'required'
        ]);
        $setting = CourseModule::findOrFail(\request('course_module_id'));
        $setting->delete();
        return response()->json(['data' => 'ok'], 200);
    }
}
