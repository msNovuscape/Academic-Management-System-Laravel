<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\UpdateEnrollmentReqest;
use App\Models\Country;
use App\Models\Student as Model;
use App\Services\Student\EnrollmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    protected $view = 'admin.student.';
    private $enrollmentService;

    public function __construct(EnrollmentService $service)
    {
        $this->enrollmentService = $service;
    }

    public function index()
    {
        $settings = Model::paginate(config('custom.per_page'));
        return view($this->view.'index',compact('settings'));
    }

    public function show($id)
    {
        $setting = Model::findOrFail($id);
        $countries = Country::all();
        $my_general = 'general_view';
        return view($this->view.'show',compact('setting','countries','my_general'));
    }

    public function edit($id)
    {
        $setting = Model::findOrFail($id);
        $countries = Country::all();
        $edit_status = 1;  //for showing edit form
        $my_general = 'general_view';
        return view($this->view.'show',compact('setting','countries','edit_status','my_general'));
    }

    public function update(UpdateEnrollmentReqest $request,$id)
    {
        $validatedData = $request->validated();
        $this->enrollmentService->updateData($validatedData,$id);
        Session::flash('success','Successfully updated!');
        return redirect('admin/students');
    }

    public function getAttendance($id)
    {
        $setting = Model::findOrFail($id);
        $countries = Country::all();
        $my_general = 'attendance_view';
        return view($this->view.'show',compact('setting','countries','my_general'));
    }
}
