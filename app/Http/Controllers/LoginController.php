<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::user()){
            return redirect('');
        }
        return view('auth.login');
    }

    public function postLogin()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (Auth::attempt(['email'=>request('email'),'password'=>request('password'),'status'=>1],request()->has('remember'))){
            if(Auth::user()->user_type == 3){
                if(Auth::user()->student){
                    return redirect('student');
                }else{
                    return redirect('student/new-password');
                }
            }
            return redirect('');
        }
        return redirect('login')->withErrors(['Invalid Credentials!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
