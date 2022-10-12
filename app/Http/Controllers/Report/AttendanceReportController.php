<?php

namespace App\Http\Controllers\Report;

use App\Exports\AttendanceExport;
use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Student;
use App\Services\Report\AttendanceReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceReportController extends Controller
{
    protected $view = 'report.attendance.';
    private $attendanceReportService;

    public function __construct(AttendanceReportService $service)
    {
        $this->attendanceReportService = $service;
    }
    public function index()
    {
        $courses = Course::all();
        $batches = Batch::whereHas('admissions')->get();
        return view($this->view.'index',compact('courses','batches'));
    }

    public function getBatch($course_id)
    {
        $course = Course::findOrFail($course_id);
        $settings = $course->batches;
        $returnHtml = view($this->view.'batch_dom',['settings' => $settings])->render();
        return response()->json(array('success' =>true, 'html' => $returnHtml));
    }

    public function getStudent($batch_id)
    {
        $batch = Batch::findOrFail($batch_id);
        $settings = $batch->students;
        $returnHtml = view($this->view.'student_dom',['settings' => $settings])->render();
        return response()->json(array('success' =>true, 'html' => $returnHtml));
    }

    public function report()
    {
        $this->validate(\request(),[
            'report_type' => 'required|numeric',
            'batch_id' => 'required|numeric',
        ]);
        if(\request('report_type') == array_search('show',config('custom.report_types'))){
            $batch = Batch::findOrFail(\request('batch_id'));
            $settings = $this->attendanceReportService->getReportData();
            if(\request('name')){
                $student = Student::findOrFail(\request('name'));
                return view($this->view.'show.student_show',compact('settings','student','batch'));
            }
            return view($this->view.'show.show',compact('settings','batch'));
        }elseif (\request('report_type') == array_search('excel',config('custom.report_types'))){
            return Excel::download(new AttendanceExport(),'attendance.xlsx');
        }

    }
}
