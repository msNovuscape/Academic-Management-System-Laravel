<?php
namespace App\Services;

use App\Models\CourseModule;

class CourseModuleService
{
    public function storeData($requestAll)
    {
        foreach ($requestAll['name'] as $req) {
            $setting = new CourseModule();
            $setting->course_id = $requestAll['course_id'];
            $setting->name = $req;
            $setting->status = 1;
            $setting->save();
        }
        return $setting;
    }

    public function updateData($requestAll)
    {
        if ($requestAll['name_old']) {
            foreach ($requestAll['name_old'] as $index => $value) {
                $settingUpdate = CourseModule::findOrFail($index);
                $settingUpdate->course_id = $requestAll['course_id'];
                $settingUpdate->name = $value;
                $settingUpdate->save();
            }
        }
        foreach ($requestAll['name'] as $req) {
            $setting = new CourseModule();
            $setting->course_id = $requestAll['course_id'];
            $setting->name = $req;
            $setting->status = 1;
            $setting->save();
        }
        return 'Ok';
    }

}
