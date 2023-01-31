<?php

namespace App\Http\Controllers\Report;

use App\Exports\DueFinanceExport;
use App\Exports\FinanceExport;
use App\Http\Controllers\Controller;
use App\Mail\DueEmail;
use App\Models\Admission;
use App\Models\Batch;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Finance;
use App\Models\FiscalYear;
use App\Services\Report\FinanceReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class FinanceReportController extends Controller
{

    protected $view = 'report.finance.';
    private $financeReportService;

    public function __construct(FinanceReportService $service)
    {
        $this->financeReportService = $service;
    }
    public function index()
    {
        $fiscal_years = FiscalYear::where('status',1)->get();
        $branches = Branch::where('status',1)->get();
        $courses = Course::all();
        $batches = Batch::whereHas('admissions')->get();
//        $students = Admission::whereHas('finances')->get();
        return view($this->view.'index',compact('fiscal_years','branches','courses','batches'));
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
//                dd(\request()->all());

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
            return Excel::download(new FinanceExport(), 'finance.xlsx');
       }

    }

    //sending email

    public function sendEmail()
    {
        $this->validate(\request(),[
            'finance_id' => 'required|numeric'
        ]);
        $setting = Finance::findOrFail(\request('finance_id'));
        $email = $setting->admission->user->email;
//        $email = 'swadesh.chaudhary@gmail.com';
        Mail::to($email)->send(new DueEmail($setting));
        $this->financeReportService->due_email_info($setting);
        return response()->json(['data' => $setting,'message' => 'Email has been send to '.$setting->admission->user->name.'!'],200);
    }

    public function dueFinance()
    {
        return view($this->view.'due.index');
    }

    public function postDueFinance()
    {
        $this->validate(\request(),[
            'due_day' => 'required',
            'installment_type' => 'required|numeric',
            'type' => 'required',
        ]);

        if(\request('type') == 'report'){
            return Excel::download(new DueFinanceExport(),'due_list.xlsx');
        }elseif (\request('type') == 'send_email'){
            $settings = FinanceReportService::dueList();
            if(count($settings) > 0){
                foreach ($settings as $setting){
                    $email = $setting->admission->user->email;
                    Mail::to($email)->send(new DueEmail($setting));
                    $due_email_info = $this->financeReportService->due_email_info($setting);
                }
                Session::flash('success','Due Email Has been sent!');
                return  redirect('reports/due_finance');
            }else{
                Session::flash('success','No any data found!');
                return  redirect('reports/due_finance');
            }
        }



    }

    public function financetest()
    {
//        return Excel::download(new FinanceExport(), 'invoices.xlsx');
        return view($this->view.'excel.excel');
    }
}
