<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

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
        if (\request('date')) {
            $attendances = $setting->student->attendancesOrderByDate->where('date', \request('date'));
        } else {
            $attendances = $setting->student->attendancesOrderByDate;
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
}
