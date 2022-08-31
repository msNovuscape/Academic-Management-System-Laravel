<?php
namespace App\Services\Report;

use App\Models\Admission;

class FinanceReportService {

    public function getReportData()
    {
        $settings = Admission::orderBy('id','asc');
        $from_date = \request('from_date');
        $to_date = \request('to_date');
        if(request('fiscal_year_id')&& request('branch_id') && request('course_id') && request('batch_id') && request('name') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->whereHas('batch',function ($q1){
                $q1->where('fiscal_year_id',request('fiscal_year_id'));
            })
                ->where('batch_id',request('batch_id'))->where('id',request('name'));
        }elseif(request('fiscal_year_id')&& request('branch_id') && request('course_id') && request('batch_id') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->whereHas('batch',function ($q1){
                $q1->where('fiscal_year_id',request('fiscal_year_id'));
            })
                ->where('batch_id',request('batch_id'));
        }elseif(request('fiscal_year_id')&& request('branch_id') && request('course_id')  && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->whereHas('batch.time_slot',function ($t){
                $t->where('course_id',request('course_id'));
            })->whereHas('batch',function ($q1){
                $q1->where('fiscal_year_id',request('fiscal_year_id'));
            });
        }elseif(request('fiscal_year_id')&& request('branch_id')  && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->whereHas('batch.time_slot',function ($t){
                $t->where('branch_id',request('branch_id'));
            })->whereHas('batch',function ($q1){
                $q1->where('fiscal_year_id',request('fiscal_year_id'));
            });
        }elseif(request('branch_id') && request('course_id') && request('batch_id') && request('name') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->where('batch_id',request('batch_id'))->where('id',request('name'));
        }elseif(request('branch_id') && request('course_id') && request('batch_id')  && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->where('batch_id',request('batch_id'));
        }elseif(request('branch_id') && request('course_id')  && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->whereHas('batch.time_slot',function ($t){
                $t->where('course_id',request('course_id'));
            });
        }elseif(request('course_id') && request('batch_id') && request('name') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->where('batch_id',request('batch_id'))->where('id',request('name'));
        }elseif(request('course_id') && request('batch_id') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->where('batch_id',request('batch_id'));
        }elseif(request('course_id') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->whereHas('batch.time_slot',function ($t){
                $t->where('course_id',request('course_id'));
            });
        }elseif(request('batch_id') && request('name') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->where('batch_id',request('batch_id'))->where('id',request('name'));
        }elseif(request('batch_id')  && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('finances',function ($q) use ($from_date,$to_date){
                $q->where('date','>=',$from_date)->where('date','<=',$to_date);
            })->where('batch_id',request('batch_id'));
        }elseif(request('course_id') && request('batch_id')  && request('payment_status')){
            $settings = $settings->whereHas('finances',function ($q){
                $q->where('status',request('payment_status'));
            })->where('batch_id',request('batch_id'));
        }elseif(request('course_id') && request('batch_id')  && request('bank_status')){
            $settings = $settings->whereHas('finances',function ($q){
                $q->where('bank_status',request('bank_status'));
            })->where('batch_id',request('batch_id'));
        }elseif(request('batch_id')  && request('payment_status')){
            $settings = $settings->whereHas('finances',function ($q){
                $q->where('status',request('payment_status'));
            })->where('batch_id',request('batch_id'));
        }elseif(request('batch_id')  && request('bank_status')){
            $settings = $settings->whereHas('finances',function ($q){
                $q->where('bank_status',request('bank_status'));
            })->where('batch_id',request('batch_id'));
        }elseif (request('fiscal_year_id')){
            $settings = $settings->whereHas('batch',function ($q1){
                $q1->where('fiscal_year_id',request('fiscal_year_id'));
            });
        }elseif (request('branch_id')){
            $settings = $settings->whereHas('batch.time_slot',function ($q1){
                $q1->where('branch_id',request('branch_id'));
            });
        }elseif (request('course_id')){
            $settings = $settings->whereHas('batch.time_slot',function ($q1){
                $q1->where('course_id',request('course_id'));
            });
        }elseif (request('batch_id')){
            $settings = $settings->whereHas('finances')->where('batch_id',request('batch_id'));
        }elseif (request('payment_status')){
            $settings = $settings->whereHas('finances',function ($q){
                $q->where('status',request('payment_status'));
            });
        }elseif (request('bank_status')){
            $settings = $settings->whereHas('finances',function ($q){
                $q->where('bank_status',request('bank_status'));
            });
        }
        return $settings;
    }

}
