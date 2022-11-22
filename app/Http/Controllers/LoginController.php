<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\LoginService;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::user()){
            return redirect('');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (Auth::attempt(['email'=>request('email'),'password'=>request('password'),'status'=>1],request()->has('remember'))){
            //saving in log table
            $log = LoginService::log();
            if(Auth::user()->user_type == 3){
                if(self::student_restriction()){
                    if(Auth::user()->student){
                        return redirect('student');
                    }else{
                        return redirect('student/new-password');
                    }
                }else{
                    Auth::logout();
                    return redirect('login')->withErrors(['Your login is temporary restricted.Please contact to admin!']);
                }
            }
            if (Auth::user()->updated_at == null) {
                return redirect('other/new-password');
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

    public function student_restriction()
    {
        $check_status = true;
        $first_installment = Auth::user()->admission->finances[0];
        $second_installment = Auth::user()->admission->finances[1];
        $third_installment = Auth::user()->admission->finances[2];
        if($first_installment->status == array_search('Paid',config('custom.payment_status')) && $second_installment->status == array_search('Paid',config('custom.payment_status')) && $third_installment->status == array_search('Paid',config('custom.payment_status'))){
            $check_status = true;
        }elseif($first_installment->status == array_search('Paid',config('custom.payment_status')) && $second_installment->status == array_search('Paid',config('custom.payment_status')) && $third_installment->status == array_search('Unpaid',config('custom.payment_status'))){
            //if 3rd installment is unpaid
            if($third_installment->extend_date){
                //if 3rd installment has extend date
               if($third_installment->extend_date->due_date > date('Y-m-d')) {
                   $check_status = true;
               }else{
                   $check_status = false;
               }
            }else{
                if($third_installment->batch_installment->due_date > date('Y-m-d')){
                    $check_status = true;
                }else{
                    $check_status = false;
                }
            }
        }elseif($first_installment->status == array_search('Paid',config('custom.payment_status')) && $second_installment->status == array_search('Unpaid',config('custom.payment_status'))){
            //if 2nd installment is unpaid
            if($second_installment->extend_date){

                //if 2nd installment has extend date
                if($second_installment->extend_date->due_date > date('Y-m-d')) {
                    $check_status = true;
                }else{
                    $check_status = false;
                }
            }else{
                if($second_installment->batch_installment->due_date > date('Y-m-d')){
                    $check_status = true;
                }else{
                    $check_status = false;
                }
            }
        }elseif($first_installment->status == array_search('Unpaid',config('custom.payment_status'))){
            //if 1st installment is unpaid
            if($first_installment->extend_date){
                //if 1st installment has extend date
                if($first_installment->extend_date->due_date > date('Y-m-d')) {
                    $check_status = true;
                }else{
                    $check_status = false;
                }
            }else{
                if($first_installment->batch_installment->due_date > date('Y-m-d')){
                    $check_status = true;
                }else{
                    $check_status = false;
                }
            }
        }
        return $check_status;
    }
}
