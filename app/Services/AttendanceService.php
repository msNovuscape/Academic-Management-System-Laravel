<?php
namespace App\Services;

use App\Models\Attendance;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class AttendanceService {

    /**
     * @return  object $batch
     */
    public function getBatch()
    {

//       $batches  = Batch::whereHas('students')->where('end_date','>=',date('Y-m-d'))->where('status',1);
        if(request('batch_id')){
            $key = request('batch_id');
            $batches  = Batch::where('id',$key)->whereHas('students');
        }else{
            $batches  = Batch::whereHas('students');
        }
       return $batches->orderBy('id','desc')->first();
    }

    /**
     * @param integer $batch_id
     * @param date $attendance_date
     * @return  array of objects Attendance
     */
    public function getBatchAttendances($batch_id,$attendance_date)
    {
        $attendances = Attendance::whereHas('student',function ($s) use ($batch_id){
            $s->whereHas('admission',function ($a) use ($batch_id){
                $a->where('batch_id',$batch_id);
            });
        })->where('date',$attendance_date)
            ->with('student')
            ->with('student.admission')
            ->with('student.admission.user')->get();
        return $attendances;
    }

    /**
     * @param array of attendance request which have student_id,status,symbol,here [status 1 for Present and 2 for Absent] [symbol P for Present and A for Absent]
     * @param date $attendance_date date of attendance
     * @return  array of objects Attendance
     */
    public function storeData($attendance_data,$attendance_date)
    {
        if(count($attendance_data) > 0){
            $std = Student::findOrFail($attendance_data[0]->student_id);
            $batch = $std->admission->batch;
            //start if condition for the attendance date must in between batch start and batch end date and attendance date is not greater than current date
            if(($attendance_date >= $batch->start_date) && ($attendance_date <= $batch->end_date) && ($attendance_date <= date('Y-m-d')) ){
                foreach ($attendance_data as $req_att){
                    $student = Student::findOrFail($req_att->student_id);
                    $setting = Attendance::firstOrNew(['student_id' => $student->id, 'date' => $attendance_date]);
                    $setting->user_id = Auth::user()->id;
                    $setting->status = $req_att->status;
                    $setting->symbol = $req_att->symbol;
                    $setting->save();
                }
                $batch_id = $batch->id;
                $attendances = $this->getBatchAttendances($batch_id,$attendance_date);
                return $attendances;
            }else{
                return $attendances = [];
            }
            //end if condition
        }
    }

    /**
     * @param integer $id
     * @param integer $status
     * @param string $symbol
     * @return  object  Attendance
     */
    public function updateData($id, $status, $symbol)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->status = $status;
        $attendance->symbol = $symbol;
        $attendance->save();
        return $attendance;

    }

}
