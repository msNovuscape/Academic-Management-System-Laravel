<?php
namespace App\Services\Counselling;

use App\Models\SCounselling;
use App\Models\SCounsellingAttendance;
use App\Models\SCounsellingStatus;
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
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function attendance($studentCounselling)
    {
        $setting =  SCounsellingAttendance::firstOrNew(['s_counselling_id'=>$studentCounselling->id, 'date'=>request('date')]);
        $setting->status = request('status');
        if (request('status') == 1) {
            $setting->symbol = 'Present';
        } else {
            $setting->symbol = 'Absent';
        }
        $setting->created_by = Auth::user()->id;
        return $setting->save();

    }
}
