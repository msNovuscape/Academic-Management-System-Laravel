<?php
namespace App\Services\Report;

use App\Models\Admission;
use App\Models\DueEmailInfo;
use App\Models\Finance;

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

    public function due_email_info($setting)
    {
        $due_email_info = new DueEmailInfo();
        $due_email_info->finance_id = $setting->id;
        $due_email_info->content = '<p>Please be advised that you’ve been temporarily removed from the Skype Learning Group as we haven’t received '.config('custom.installment_types')[$setting->batch_installment->installment_type].' payment update from your side.</p>';
        $due_email_info->save();
        return $due_email_info;
    }

    public static function dueList()
    {
        $due_day = \request('due_day');
        $installment_type = \request('installment_type');

        if($due_day == 'Over'){
            $date_required_to_compare = date('Y-m-d');
            $settings = Finance::whereHas('batch_installment',function ($q) use ($installment_type,$date_required_to_compare){
                $q->where('due_date','<',$date_required_to_compare)
                    ->where('installment_type',$installment_type);
            })->where('extend_status',1)->orWhereHas('extend_date',function ($e) use($date_required_to_compare,$installment_type){
                $e->whereHas('batch_installment',function ($i) use ($installment_type){
                    $i->where('installment_type',$installment_type);
                })->where('due_date','<',$date_required_to_compare);
            })->where('extend_status',2)->where('status',2)->get();
        }else{
            $date_required_to_compare = date('Y-m-d', strtotime('+'.$due_day.' day'));
            $settings = Finance::whereHas('batch_installment',function ($q) use ($installment_type,$date_required_to_compare){
                $q->where('due_date',$date_required_to_compare)
                    ->where('installment_type',$installment_type);
            })->where('extend_status',1)->orWhereHas('extend_date',function ($e) use($date_required_to_compare,$installment_type){
                $e->whereHas('batch_installment',function ($i) use ($installment_type){
                    $i->where('installment_type',$installment_type);
                })->where('due_date',$date_required_to_compare);
            })->where('extend_status',2)->where('status',2)->get();
        }
        return $settings;
    }

}
