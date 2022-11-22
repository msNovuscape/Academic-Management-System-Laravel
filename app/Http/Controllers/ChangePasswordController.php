<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\NewPassword;
use App\Services\Student\EnrollmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{

    public function index()
    {
        return view('auth.change_password.index');
    }

    public function changePassword(NewPassword $request)
    {
        $validatedData = $request->validated();
        $user = Auth::user();
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        Auth::logout();
        Session::flash('success', 'Your Password has been changed!');
        return redirect('');
    }

    public function getNewPassword()
    {
        return view('auth.other.change_password');
    }

    public function postNewPassword(NewPassword $request)
    {
        $validatedData = $request->validated();
        $enrollmentService = new EnrollmentService();
        $enrollmentService->newPassword($validatedData);
        return redirect('');
    }
}
