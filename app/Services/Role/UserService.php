<?php
namespace App\Services\Role;

use App\Models\StudentPassword;
use App\Models\User;
use App\Models\UserEmailInfo;
use App\Models\UserInfo;
use App\Models\UserTeacher;
use App\Services\SettingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function search()
    {
        $settings = User::where('user_type', '!=', 3)->where('user_type', '!=', 1)->orderBy('id', 'desc');

        if (request('name')) {
            $key = \request('name');
            $settings = $settings->where('name', 'like', '%'.$key.'%');
        }
        if (request('course_id')) {
            $key = \request('course_id');
            $settings = $settings->whereHas('userTeachers', function ($q) use ($key) {
                $q->where('course_id', $key);
            });
        }
        if (request('per_page')) {
            $perPage = request('per_page');
            $settings = $settings->paginate($perPage);
        } else {
            $settings = $settings->paginate(config('custom.per_page'));
        }
        return $settings;
    }

    public function storeData($requestAll)
    {
        try {
            DB::beginTransaction();
            // Create User Account
            $user = new User();
            $user->name = $requestAll['name'];
            $user->email = $requestAll['email'];
            $random_password = $this->randString(6);
            $user->password = Hash::make($random_password);
            $user->status = request('status');
            $user->user_type = array_search('Other', config('custom.user_types'));
            $user->save();
            //save user password
            $student_password = new StudentPassword();
            $student_password->user_id = $user->id;
            $student_password->password = $random_password;
            $student_password->save();

            //checking hashed password
            if (!Hash::check($student_password->password, $user->password)) {
                $newPassword = $this->randString(6);
                $hashedPassword = Hash::make($newPassword);
                if (Hash::check($newPassword, $hashedPassword)) {
                    $user->password = $hashedPassword;
                    $student_password->password = $newPassword;
                    $user->save();
                    $student_password->save();
                }
            }
            // Saving User Info
            $userInfo = new UserInfo();
            $userInfo->user_id = $user->id;
            $userInfo->created_by = Auth::user()->id;
            $userInfo->mobile_no = $requestAll['mobile_no'];
            $userInfo->address = $requestAll['address'];
            $userInfo->emp_id = $requestAll['emp_id'];
            if ($requestAll['image']) {
                $directory = SettingService::makeDirectory(array_search('other_user', config('custom.image_folders')));
                $extension = $requestAll['image']->getClientOriginalExtension();
                $file_name = md5(rand(111, 999).Auth::user()->id).'.'.$extension;
                $path = $directory.$file_name;
                $requestAll['image']->move($directory, $file_name);
                $userInfo->image = $path;
            }
            $userInfo->tutor_status = $requestAll['tutor'];
            $userInfo->save();
            if ($requestAll['tutor'] == 1) {
                foreach (request('course_id') as $reqCourse) {
                    $userTeacher = new UserTeacher();
                    $userTeacher->user_id = $user->id;
                    $userTeacher->course_id = $reqCourse;
                    $userTeacher->status = 1;
                    $userTeacher->save();
                }
            }
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateData($requestAll, $id)
    {
        try {
            DB::beginTransaction();
            // Create User Account
            $user = User::findOrFail($id);
            $user->name = $requestAll['name'];
            $user->email = $requestAll['email'];
            $user->status = $requestAll['status'];
            $user->save();
            //checking hashed password
            if (!Hash::check($user->student_password->password, $user->password)) {
                $newPassword = $this->randString(6);
                $hashedPassword = Hash::make($newPassword);
                if (Hash::check($newPassword, $hashedPassword)) {
                    $user->password = $hashedPassword;
                    $user->student_password->password = $newPassword;
                    $user->save();
                    $user->student_password->save();
                }
            }
            // Saving User Info
            $userInfo = $user->userInfo;
            $userInfo->created_by = Auth::user()->id;
            $userInfo->mobile_no = $requestAll['mobile_no'];
            $userInfo->address = $requestAll['address'];
            $userInfo->emp_id = $requestAll['emp_id'];
            if (request('image')) {
                $directory = SettingService::makeDirectory(array_search('other_user', config('custom.image_folders')));
                $extension = $requestAll['image']->getClientOriginalExtension();
                $file_name = md5(rand(111, 999).Auth::user()->id).'.'.$extension;
                $path = $directory.$file_name;
                $requestAll['image']->move($directory, $file_name);
                $userInfo->image = $path;
            }
            $userInfo->tutor_status = $requestAll['tutor'];
            $userInfo->save();
            if ($requestAll['tutor'] == 1) {
                if (request('course_id')) {
                    //making all subject status 2
                    foreach ($user->userTeachers as $previousTeacher) {
                        $previousTeacher->status = 2; //no longer to be subject teacher
                        $previousTeacher->save();
                    }

                    foreach (request('course_id') as $reqCourse) {
                        $userTeacher = UserTeacher::firstOrNew(['user_id' => $user->id, 'course_id' => $reqCourse]);
                        $userTeacher->status = 1;
                        $userTeacher->save();
                    }
                }

                if (request('course_id_update')) {
                    //making all subject status 2
                    foreach ($user->userTeachers as $previousTeacher) {
                        $previousTeacher->status = 2; //no longer to be subject teacher
                        $previousTeacher->save();
                    }
                    foreach (request('course_id_update') as $reqCourse_update) {
                        $userTeacher = UserTeacher::firstOrNew(['user_id' => $user->id, 'course_id' => $reqCourse_update]);
                        $userTeacher->status = 1;
                        $userTeacher->save();
                    }
                }

            }
            // user is not now tutor
            if ($requestAll['tutor'] == 2) {
                if ($user->userTeachersWithActiveCourse->count() > 0) {
                    //making all subject status 2
                    foreach ($user->userTeachersWithActiveCourse as $previousTeacher) {
                        $previousTeacher->status = 2; //no longer to be subject teacher
                        $previousTeacher->save();
                    }
                }
            }
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    //save the admission email information
    public function storeEmailInfo($setting)
    {
        $admission_email = new UserEmailInfo();
        $admission_email->user_id = $setting->id;
        $admission_email->content = '<p>Please, find your Academic Management Systems (AMS) Temporary Credentials. We request you to set your new password and complete the form to access the portal...</p> <p> <strong>Your AMS Login Details</strong> </p><p> <strong>Username :</strong> '.$setting->email.'</p><p> <strong>Password :</strong>'.$setting->student_password.'</p>';
        $admission_email->save();
        return $admission_email;
    }

    //to generate random password
    public function randString($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }

}

