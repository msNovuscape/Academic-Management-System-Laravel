<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UserRequest;
use App\Http\Requests\Role\UserUpdateRequest;
use App\Models\Course;
use App\Models\User;
use App\Services\Role\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    protected $view = 'admin.roles.user.';
    protected $redirect = 'users';
    protected $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }

    public function index()
    {
        $courses = Course::where('name', '!=', 'Career Counselling')->get();
        $settings = $this->userService->search();
        return view($this->view.'index', compact('courses', 'settings'));
    }

    public function create()
    {
        $courses = Course::where('name', '!=', 'Career Counselling')->get();
        return view($this->view.'create', compact('courses'));
    }

    public function store(UserRequest $request)
    {
        $validateData = $request->validated();
        $this->userService->storeData($validateData);
        Session::flash('success', 'User is created!');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $setting = User::findOrFail($id);
        $courses = Course::where('name', '!=', 'Career Counselling')->get();
        return view($this->view.'show', compact('courses', 'setting'));
    }

    public function edit($id)
    {
        $setting = User::findOrFail($id);
        $courses = Course::where('name', '!=', 'Career Counselling')->get();
        return view($this->view.'edit', compact('courses', 'setting'));
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $validateData = $request->validated();
        $this->userService->updateData($validateData, $id);
        Session::flash('success', 'User is updated!');
        return redirect($this->redirect);

     }
}
