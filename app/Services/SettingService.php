<?php
namespace App\Services;

class SettingService {

    public static function makeDirectory($image_folder_type)
    {
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        if (config('custom.image_folders')[$image_folder_type] == 'other_user') {
            if (!is_dir(public_path().'/images/other_user/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/other_user/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/other_user/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'student'){
            if (!is_dir(public_path().'/images/student/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/student/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/student/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'course_material'){
            if (!is_dir(public_path().'/images/course_material/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/course_material/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/course_material/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'quiz_image'){
            if (!is_dir(public_path().'/images/quiz_image/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/quiz_image/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/quiz_image/'.$year.'/'.$month.'/'.$day.'/';
        }

        if(config('custom.image_folders')[$image_folder_type] == 'service'){
            if (!is_dir(public_path().'/images/service/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/service/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/service/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'academy'){
            if (!is_dir(public_path().'/images/academy/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/academy/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/academy/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'blog'){
            if (!is_dir(public_path().'/images/blog/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/blog/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/blog/'.$year.'/'.$month.'/'.$day.'/';
        }

        if(config('custom.image_folders')[$image_folder_type] == 'academy_course'){
            if (!is_dir(public_path().'/images/academy_course/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/academy_course/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/academy_course/'.$year.'/'.$month.'/'.$day.'/';
        }

        if(config('custom.image_folders')[$image_folder_type] == 'sub_office'){
            if (!is_dir(public_path().'/images/sub_office/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/sub_office/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/sub_office/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'testimonial'){
            if (!is_dir(public_path().'/images/testimonial/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/testimonial/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/testimonial/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'client'){
            if (!is_dir(public_path().'/images/client/'.$year.'/'.$month.'/'.$day)) {
                mkdir(public_path().'/images/client/'.$year.'/'.$month.'/'.$day, 0755, true);
            }
            return $directory = 'images/client/'.$year.'/'.$month.'/'.$day.'/';
        }
        if(config('custom.image_folders')[$image_folder_type] == 'slider') {
            if (!is_dir(public_path() . '/images/slider/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/slider/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/slider/' . $year . '/' . $month . '/' . $day . '/';
        }

        if(config('custom.image_folders')[$image_folder_type] == 'add_section') {
            if (!is_dir(public_path() . '/images/add_section/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/add_section/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/add_section/' . $year . '/' . $month . '/' . $day . '/';
        }

        if(config('custom.image_folders')[$image_folder_type] == 'placement') {
            if (!is_dir(public_path() . '/images/placement/' . $year . '/' . $month . '/' . $day)) {
                mkdir(public_path() . '/images/placement/' . $year . '/' . $month . '/' . $day, 0755, true);
            }
            return $directory = 'images/placement/' . $year . '/' . $month . '/' . $day . '/';
        }

    }

}
