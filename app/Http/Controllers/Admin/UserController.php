<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $view = 'admin.roles.user.';
    protected $redirect = 'users';

    public function index()
    {
        $courses = Course::where('name', '!=', 'Career Counselling')->get();
        return view($this->view.'index', compact('courses'));
    }

    public function create()
    {
        $courses = Course::where('name', '!=', 'Career Counselling')->get();
        return view($this->view.'create', compact('courses'));
    }
}
