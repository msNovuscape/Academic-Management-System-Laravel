<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginService;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user()){
            //redirect for student
            if(Auth::user()->user_type == array_search('Student', config('custom.user_types'))){
                if(Auth::user()->student){
                    return redirect('student');
                }else{
                    return redirect('student/new-password');
                }
            }
            //redirect to admin
            if (Auth::user()->updated_at == null) {
                return redirect('other/new-password');
            } else {
                return view('welcome');
//            return redirect('admissions');
            }

        }
        return view('auth.login');
    }
}
