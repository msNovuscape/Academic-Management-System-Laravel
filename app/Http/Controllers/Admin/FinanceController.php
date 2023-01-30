<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExtendDateRequest;
use App\Http\Requests\FinanceRequest;
use App\Http\Requests\Student\EnrollmentRequest;
use App\Models\Admission;
use App\Models\Batch;
use App\Models\Country;
use App\Models\Admission as Model;
use App\Models\Course;
use App\Models\Finance;
use App\Models\Student;
use App\Services\FinanceService;
use App\Services\Student\EnrollmentService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FinanceController extends Controller
{

    protected $view = 'admin.finance.';
    private $financeService;

    public function __construct(FinanceService $service)
    {
        $this->financeService = $service;
    }

    public function index()
    {
//        dd(\request()->all());
         $settings = $this->financeService->search();
         $courses = Course::all();
         $batches = Batch::all();
        return view($this->view.'index',compact('settings','courses','batches'));
    }

    public function unpaid()
    {
        $courses = Course::all();
        $batches = Batch::all();
//        $admissions = Admission::where('status',2)->orderBy('id','desc')->get();
//        $settings = Admission::where('status',4)->get(); //making empty admisssion object array
//        foreach ($admissions as $admission){
//            $total_paid =  Finance::where('admission_id',$admission->id)->where('transaction_type',1)->sum('amount')
//                - Finance::where('admission_id',$admission->id)->where('transaction_type',2)->sum('amount');
//            $my_result = Finance::checkForStatus($admission,$total_paid);
//            if($my_result == false){
//                $settings = $settings->push($admission);
//            }
//
//        }
        $settings = $this->financeService->unPaidSearch();
        return view($this->view.'unpaid', compact('settings','courses','batches'));
    }

    public function paginate($items, $perPage = 50, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]);
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function getFinance($student_id)
    {
        $setting = Student::findOrFail($student_id);
        $countries = Country::all();
        $my_general = 'finance_view';
        return view('admin.student.show',compact('setting','countries','my_general'));
    }

    public function postFinance(FinanceRequest $request ,$student_id)
    {
        $validatedData = $request->validated();
        $setting = Student::findOrFail($student_id);
        $this->financeService->storeData($setting->admission->id,$validatedData);
        $countries = Country::all();
        $my_general = 'finance_view';
        $paid_amount = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',1)->sum('amount');
        $discount = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',2)->sum('amount');
        $total_paid = $paid_amount -$discount;
        $transactions = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',1)->get();
        return view('admin.student.show',compact('setting','countries','my_general','total_paid','transactions'));
    }

    public function editFinance($finance_id)
    {
        $finance = Finance::findOrFail($finance_id);
        $setting = Student::findOrFail($finance->admission->student->id);
        $countries = Country::all();
        $my_general = 'finance_view';
        $paid_amount = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',1)->sum('amount');
        $discount = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',2)->sum('amount');
        $total_paid = $paid_amount -$discount;
        $transactions = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',1)->get();
        return view('admin.student.show',compact('setting','countries','my_general','total_paid','transactions','finance'));
    }

    public function updateFinance(FinanceRequest $request, $finance_id)
    {
        $validatedData = $request->validated();
        $result = $this->financeService->updateData($finance_id,$validatedData);
        $setting = $result->admission->student;
        $countries = Country::all();
        $my_general = 'finance_view';
        $paid_amount = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',1)->sum('amount');
        $discount = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',2)->sum('amount');
        $total_paid = $paid_amount -$discount;
        $transactions = Finance::where('admission_id',$setting->admission->id)->where('transaction_type',1)->get();
        return view('admin.student.show',compact('setting','countries','my_general','total_paid','transactions'));
    }

    public function edit($admission_id)
    {
        $setting = Admission::findOrFail($admission_id);
        // for Super Admin
        if (Auth::user()->user_type == 1) {
            $paid_amount = $setting->finances->sum('amount');
            $start_date = $setting->batch->start_date;
            $end_date = $setting->batch->end_date;
//        dd($setting->extend_dates);
            return view($this->view.'edit', compact('setting','paid_amount','start_date','end_date'));
        } else {
            if ($setting->admissionBranch->branch->userBranches->count() > 0) {
                $paid_amount = $setting->finances->sum('amount');
                $start_date = $setting->batch->start_date;
                $end_date = $setting->batch->end_date;
//        dd($setting->extend_dates);
                return view($this->view.'edit', compact('setting','paid_amount','start_date','end_date'));
            } else {
                Session::flash('custom_error', 'You are not allowed!');
                return redirect('finances');
            }
        }


    }

    public function extend_date(ExtendDateRequest $request)
    {
        $validatedData = $request->validated();
        $result = $this->financeService->extendDate();
        return response()->json(['date' => 'success'],200);
    }

    public function editold($admission_id)
    {
        $setting = Admission::findOrFail($admission_id);
        $returnHtml = view($this->view.'finance_modal_edit',['setting' => $setting])->render();
        return response()->json(array('success' =>true, 'html' => $returnHtml));

    }

    public function update(FinanceRequest $request, $finance_id)
    {
        $validatedData = $request->validated();
        $result = $this->financeService->updateData($finance_id,$validatedData);
        Session::flash('success','Payment has been updated!');
        return redirect()->back();
    }

    public function updateold(FinanceRequest $request, $finance_id)
    {
        $validatedData = $request->validated();
        $result = $this->financeService->updateData($finance_id,$validatedData);
        Session::flash('success','Payment has been updated!');
        return response()->json(['data' =>'success','data1' => $result]);
    }

}
