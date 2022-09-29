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
            if(Auth::user()->user_type == array_search('Student',config('custom.user_types'))){
                if(Auth::user()->student){
                    return redirect('student');
                }else{
                    return redirect('student/new-password');
                }
            }
            //redirect to admin
//            dd(request()->userAgent());
//            $country=file_get_contents('http://api.hostip.info/get_html.php?ip=');
//            dd($country);
            $getip = LoginService::get_ip();
            $getbrowser = LoginService::get_browsers();
            $getdevice = LoginService::get_device();

            $getos = LoginService::get_os();
            $ip = '162.159.24.227'; /* Static IP address */
            $ip = \request()->ip();
//            dd($ip);
//            $position = Location::get();
//            dd($position->countryName);
//            $currentUserInfo = Location::get('192.168.1.1');
//            dd($currentUserInfo);
            return view('welcome');
        }
        return view('auth.login');
    }
}
