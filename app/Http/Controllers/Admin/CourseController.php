<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\Course as Model;
use App\Services\CourseService;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{

    protected $view = 'admin.course.';
    protected $redirect = 'courses';
    private $courseService;

    public function __construct(CourseService $service)
    {
        $this->courseService = $service;
    }

    public function index()
    {
        $settings = $this->courseService->search();
        return view($this->view.'index',compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(StoreCourseRequest $request)
    {
        $validatedData = $request->validated();
        $this->courseService->storeData($validatedData);
        Session::flash('success','Course has been created!');
        return redirect($this->redirect);
    }

    public function edit()
    {

    }

    public function update(StoreCourseRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->courseService->updateData($validatedData, $id);
        Session::flash('success', 'Course has been updated!');
        return redirect($this->redirect);
    }

    public function delete($id)
    {
        $setting = Course::findOrFail($id);
        if ($setting->time_slots->count() > 0) {
           Session::flash('custom_error', 'The Course has been assigned to Time slot!');
        }else {
            $setting->delete();
            Session::flash('success', 'The Course has been delete!');
        }
        return redirect($this->redirect);
    }


}
