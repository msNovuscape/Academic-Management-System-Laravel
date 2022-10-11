<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
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

    public function report()
    {
        $this->validate(\request(),[
            'report_type' => 'required|numeric'
        ]);


        if(\request('report_type') == array_search('show',config('custom.report_types'))){
            $settings = $this->financeReportService->getReportData();
            $settings = $settings->with('finances')->get();
            $installment1 = 0.0;
            $installment2 = 0.0;
            $installment3 = 0.0;
            $discount = 0.0;
            return view($this->view.'show.show',compact('settings','installment1','installment2','installment3','discount'));
        }elseif (\request('report_type') == array_search('pdf',config('custom.report_types'))){
            $settings = $this->financeReportService->getReportData();
            $settings = $settings->with('finances')->get();
            $installment1 = 0.0;
            $installment2 = 0.0;
            $installment3 = 0.0;
            $pdf = Pdf::loadView($this->view.'pdf.pdf', compact('settings','installment1','installment2','installment3'));
            return $pdf->download('finance.pdf');
        }elseif (\request('report_type') == array_search('excel',config('custom.report_types'))){
            return Excel::download(new FinanceExport(),'finance.xlsx');
        }

    }
}
