<?php
namespace App\Services\Counselling;

use App\Models\Attendance;
use App\Models\SCounselling;
use App\Models\SCounsellingAttendance;
use App\Models\SCounsellingStatus;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CounsellingService
{
    public function storeData($admission)
    {
        try {
            DB::beginTransaction();
                $setting =  SCounselling::firstOrNew(['admission_id' => $admission->id]);
                $setting->date = date('Y-m-d');
                $setting->status = 2;
                $setting->attendance_status = 2;
                $setting->created_by = Auth::user()->id;
                $setting->save();
                $setting->studentCounsellingStatuses()->delete();
                foreach (request('status') as $index => $value) {
                    $counsellingStatus = SCounsellingStatus::firstOrNew(['s_counselling_id'=>$setting->id, 'status'=>$value]);
                    $counsellingStatus->comment = request('comment')[$value];
                    $counsellingStatus->save();
                }
                if ($setting->studentCounsellingStatuses->count() == 5) {
                    $setting->status = 1;
                    $setting->save();
                }
                if ($setting->s_counselling_attendances->count() == 7) {
                    $setting->attendance_status = 1;
                    $setting->save();
                }
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function attendance($studentCounselling)
    {
//        dd($studentCounselling);

        $setting =  SCounsellingAttendance::firstOrNew(['s_counselling_id'=>$studentCounselling->id, 'date'=>request('date')]);
        $setting->status = request('status');
        if (request('status') == 1) {
            $setting->symbol = 'Present';
        } else {
            $setting->symbol = 'Absent';
        }
        $setting->created_by = Auth::user()->id;
        $setting->save();
        if ($studentCounselling->s_counselling_attendances->count() > 8) {
            $studentCounselling->attendance_status = 1;
            $studentCounselling->save();
        }
        return $setting;

    }

    public function search()
    {
        $settings = SCounselling::where('status', 2)->orderBy('id', 'asc');
        if (request('date')) {
            $key = \request('date');
            $settings = $settings->where('date', $key);
        }
        if (request('name')) {
            $key = \request('name');
            $settings = $settings->whereHas('admission', function ($a) use ($key) {
                $a->whereHas('user', function ($u) use ($key) {
                   $u->where('name', 'like', '%'.$key.'%');
                })->orWhere('student_id', 'like', '%'.$key.'%');
            });
        }
        if (request('course_id')) {
            $key = \request('course_id');
            $settings = $settings->whereHas('admission.batch.time_slot', function ($q) use ($key){
                $q->where('course_id', $key);
            });
        }
        if (request('batch_id')) {
            $key = \request('batch_id');
            $settings = $settings->whereHas('admission', function ($a) use ($key){
                $a->where('batch_id', $key);
            });
        }
        if (request('counselling_status')) {
            $key = \request('counselling_status');
            $settings = $settings->whereHas('studentCounsellingStatuses', function ($a) use ($key) {
                $a->where('status', $key);
            });
        }
        if (request('per_page')) {
            $perPage = request('per_page');
            $settings = $settings->paginate($perPage);
        } else {
            $settings = $settings->paginate(config('custom.per_page'));
        }
        return $settings;
    }

    public function searchCompleted()
    {
        $settings = SCounselling::where('status', '1')->orderBy('id', 'desc');

        if (request('date')) {
            $key = \request('date');
            $settings = $settings->where('date', $key);
        }
        if (request('name')) {
            $key = \request('name');
            $settings = $settings->whereHas('admission', function ($a) use ($key) {
                $a->whereHas('user', function ($u) use ($key) {
                   $u->where('name', 'like', '%'.$key.'%');
                })->orWhere('student_id', 'like', '%'.$key.'%');
            });
        }
        if (request('course_id')) {
            $key = \request('course_id');
            $settings = $settings->whereHas('admission.batch.time_slot', function ($q) use ($key){
                $q->where('course_id', $key);
            });
        }
        if (request('batch_id')) {
            $key = \request('batch_id');
            $settings = $settings->whereHas('admission', function ($a) use ($key){
                $a->where('batch_id', $key);
            });
        }
        if (request('per_page')) {
            $perPage = request('per_page');
            $settings = $settings->paginate($perPage);
        } else {
            $settings = $settings->paginate(config('custom.per_page'));
        }
        return $settings;
    }

    public function storeAttendance($attendance_data,$attendance_date)
    {
        if(count($attendance_data) > 0){
            //start if condition for the attendance date must in between batch start and batch end date and attendance date is not greater than current date
                foreach ($attendance_data as $req_att){
                    $student = SCounselling::findOrFail($req_att->student_id);
                    $setting =  SCounsellingAttendance::firstOrNew(['s_counselling_id'=>$student->id, 'date'=>$attendance_date]);
                    $setting->created_by = Auth::user()->id;
                    $setting->status = $req_att->status;
                    $setting->symbol = $req_att->symbol;
                    $setting->save();
                    if ($student->s_counselling_attendances->count() >8 ) {
                        $student->attendance_status = 1;
                        $student->save();
                    }
                }
                return $attendance_data;
        }
    }

    public function singleAttendance($id, $status, $symbol)
    {
        $attendance = SCounsellingAttendance::findOrFail($id);
        $attendance->status = $status;
        $attendance->symbol = $symbol;
        $attendance->save();
        return $attendance;

    }

}
