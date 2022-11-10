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
//        $user = Auth::user()->toArray();
//        dd(session()->all()['login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d']);
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
//            return view('welcome');
            return redirect('admissions');
        }
        return view('auth.login');
    }
}
