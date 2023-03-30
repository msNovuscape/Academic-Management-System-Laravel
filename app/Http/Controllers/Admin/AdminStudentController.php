<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\CourseMaterial;
use App\Models\CourseMaterialNotAssigned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminStudentController extends Controller
{
    public function index($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        return view('admin.student_detail_view.general.index', compact('setting'));
    }

    public function attendance($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        if($setting->student) {
            if (\request('date')) {
                $attendances = $setting->student->attendancesOrderByDate->where('date', \request('date'));
            } else {
                $attendances = $setting->student->attendancesOrderByDate;
            }
        } else {
            $attendances = [];
        }


        return view('admin.student_detail_view.attendance.index', compact('setting', 'attendances'));
    }

    public function quiz($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        $batchQuizzes = $setting->batch->quiz_batches->where('status', 1);
        $individualQuizzes = $setting->quiz_individuals->where('status', 1);
        $batchQuizzesCount = $batchQuizzes->count();
        $batchQuizResults = $setting->batch_quiz_results;
        $batchQuizResultCount = $setting->batch_quiz_results->count();
        $individualQuizResults = $setting->individual_quiz_results;
        return view('admin.student_detail_view.quiz.index', compact('setting', 'batchQuizzes',
            'individualQuizzes', 'batchQuizzesCount', 'batchQuizResults', 'individualQuizResults', 'batchQuizResultCount'));

    }

    public function finance($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        $finances = $setting->finances;
        return view('admin.student_detail_view.finance.index', compact('setting', 'finances'));
    }

    public function career($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        return view('admin.student_detail_view.career.index', compact('setting'));
    }

    public function courseMaterials($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        $course_materials = $setting->batch->time_slot->course->course_materials->where('status', 1);
        if ($setting->batch->time_slot->course->course_modules->count() > 0) {
            $course_materials_assigned = CourseMaterial::whereHas('course_material_module.course_module.admission_batch_materials', function ($q) use ($setting) {
                $q->where('admission_id', $setting->id);
            })->orWhereHas('course_material_module.course_module.transfer_batch_materials', function ($q1) use($setting) {
                $q1->where('admission_id', $setting->id);
            });
            $course_materials_assigned = $course_materials_assigned->get();
        } else {
            $course_materials_assigned = CourseMaterial::whereHas('batch_course_materials', function ($q) use ($setting) {
                $q->where('batch_id', $setting->batch_id);
            });
        }
        return view('admin.student_detail_view.course_material.index', compact('setting', 'course_materials', 'course_materials_assigned'));
    }



    public function updateCourseMaterialChecked($admissionId, $courseMaterialId)
    {
        $setting = Admission::findOrFail($admissionId);
        $course_material = CourseMaterial::findOrFail($courseMaterialId);
        $assigned = CourseMaterialNotAssigned::where('admission_id', $setting->id)
                                              ->where('course_material_id', $course_material->id)
                                              ->get();
        if ($assigned->count() > 0) {
            $assigned->first()->delete();
        }
        return response()->json(['id' => $course_material->id, 'status' => 'delete'], 200);
    }
    public function updateCourseMaterialUnChecked($admissionId, $courseMaterialId)
    {
        $setting = Admission::findOrFail($admissionId);
        $course_material = CourseMaterial::findOrFail($courseMaterialId);
        $assigned = CourseMaterialNotAssigned::firstOrNew(['admission_id' => $setting->id, 'course_material_id' => $course_material->id]);
        $assigned->save();
        return response()->json(['id' => $course_material->id, 'status' => 'insert'], 200);
    }
    public function courseMaterialsOld($admissionId)
    {
        $setting = Admission::findOrFail($admissionId);
        if ($setting->batch->time_slot->course->course_modules->count() > 0) {
            $course_materials = CourseMaterial::whereHas('course_material_module.course_module.admission_batch_materials', function ($q) use ($setting) {
                $q->where('admission_id', $setting->id);
            })->get();
        } else {
            $course_materials = CourseMaterial::whereHas('batch_course_materials', function ($q) use ($setting) {
                $q->where('batch_id', $setting->batch_id);
            })->get();
        }
        return view('admin.student_detail_view.course_material.index', compact('setting', 'course_materials'));
    }
}
