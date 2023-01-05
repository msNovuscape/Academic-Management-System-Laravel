<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseMaterialRequest;
use App\Models\Course;
use App\Models\User;
use App\Services\SettingService;
use Illuminate\Http\Request;
use App\Models\CourseMaterial as Model;
use App\Services\CourseMaterial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseMaterialController extends Controller
{
    //
    protected $view = 'admin.course_material.';
    protected $redirect = 'course-materials';
    protected $CourseMaterial;

    public function __construct(CourseMaterial $service)
    {
        $this->CourseMaterial = $service;
    }

    public function index()
    {
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            $settings = Model::whereHas('course.activeUserTeachers', function ($t) {
                $t->where('user_id', Auth::user()->id);
            });
        } else {
            $settings = Model::orderBy('id', 'desc');
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

    public function getModule($courseId)
    {
        $course = Course::findOrFail($courseId);
        $settings = $course->course_modules;
        if ($course->course_modules->count() > 0) {
            $returnHtml = view($this->view.'module', ['settings' => $settings])->render();
            $status = 'Yes';
        } else {
            $returnHtml = '';
            $status = 'No';
        }
        return response()->json(array('success' =>true, 'html' => $returnHtml, 'status' => $status));
    }

    public function store(CourseMaterialRequest $request)
    {
        $validateData = $request->validated();
        if($request->hasFile('link')){
            $this->validate(\request(),[
                'link' =>'required|file|mimes:jpeg,png,jpg,pdf,docx',
            ]);
            $directory = SettingService::makeDirectory(array_search('course_material',config('custom.image_folders')));
            $extension = \request()->file('link')->getClientOriginalExtension();
            $file_name = md5(rand(111,9999).Auth::user()->id).'.'.$extension;
            $path = $directory.$file_name;
            \request('link')->move($directory,$file_name);
            $this->CourseMaterial->storeData($validateData ,$path);
        }else{
            $fileName = \request('link');
            $this->CourseMaterial->storeData($validateData,$fileName);
        }
        Session::flash('success','Course Material has been created!');
        return redirect($this->redirect);

    }
    public function edit($id)
    {
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            //for tutor
            $courses = Course::whereHas('activeUserTeachers', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->where('status', 1)->get();
        } else {
            $courses = Course::where('status', 1)->get();
        }
        $setting = Model::findorfail($id);
        return view($this->view.'edit',compact('setting','courses'));
    }

    public function update(CourseMaterialRequest $request ,$id)
    {
        $validateData = $request->validated();
        if($request->hasFile('link')) {
            $this->validate(\request(), [
                'link' => 'required|file|mimes:jpeg,png,jpg,pdf,docx',
            ]);
        }
        $this->CourseMaterial->updateData($validateData,$id);
        Session::flash('success','Course Material has been Updated!');
        return redirect($this->redirect);
    }

    public function delete($id)
    {
        $setting = \App\Models\CourseMaterial::findOrFail($id);
        if ($setting->batch_course_materials->count() > 0) {
            Session::flash('custom_error', 'The Course Material has been assigned to batch!');
        }else {
            $setting->delete();
            Session::flash('success', 'The Course has been delete!');
        }
        return redirect($this->redirect);
    }
}
