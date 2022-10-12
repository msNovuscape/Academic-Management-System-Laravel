<?php

namespace App\Exports;

use App\Models\Attendance;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AttendanceExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
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
        if(request('name')){
            $student = Student::findOrFail(request('name'));
            $batch = Batch::findOrFail(request('batch_id'));
            return view('report.attendance.excel.student_excel',[
                'settings' => $settings,
                'batch' => $batch,
                'student' => $student
            ]);
        }
        return view('report.attendance.excel.excel',[
            'settings' => $settings,
        ]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
