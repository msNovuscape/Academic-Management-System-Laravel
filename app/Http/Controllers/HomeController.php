<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user()){
            //redirect for student
            if(Auth::user()->user_type == array_search('Student',config('custom.user_types'))){
                if(Auth::user()->student){
                    return redirect('student');
                }else{
                    return redirect('student/new-password');
                }
            }
            //redirect to admin
            return view('welcome');
        }
        return view('auth.login');
    }
}
