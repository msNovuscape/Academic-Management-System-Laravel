<?php
namespace App\Services\Report;

use App\Models\Admission;
use App\Models\Attendance;

class AttendanceReportService{

    public function getReportData()
    {
        $settings = Attendance::orderBy('date','asc');
        $from_date = \request('from_date');
        $to_date = \request('to_date');
        $batch_id = request('batch_id');
        if(request('batch_id') && request('name') &&request('from_date') && request('to_date')){
            $student_id = request('name');
            $settings = $settings->where('student_id',$student_id)
                                 ->where('date','>=',$from_date)->where('date','<=',$to_date)
                                 ->get();
        }elseif (request('batch_id') && request('name')){
            $student_id = request('name');
            $settings = $settings->where('student_id',$student_id)->get();
        }elseif (request('batch_id') && request('from_date') && request('to_date')){
            $settings = $settings->whereHas('student.admission',function ($q) use($batch_id){
                $q->where('batch_id',$batch_id);
            })->where('date','>=',$from_date)->where('date','<=',$to_date)->get();
        }elseif (request('batch_id')){
            $settings = $settings->whereHas('student.admission',function ($q) use($batch_id){
                                    $q->where('batch_id',$batch_id);
                        })->get();
        }
        return $settings;
    }
}
