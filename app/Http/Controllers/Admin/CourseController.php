<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
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
        $this->courseService->updateData($validatedData,$id);
        Session::flash('success','Course has been updated!');
        return redirect($this->redirect);
    }

    public function batch_test()
    {
        return view('admin.batch.test');
    }
}
