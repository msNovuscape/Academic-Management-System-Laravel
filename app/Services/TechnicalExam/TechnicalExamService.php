<?php
namespace App\Services\TechnicalExam;

use App\Models\Course;
use App\Models\TechnicalExam;
use App\Models\TExamDetail;
use App\Models\TExamTimeSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TechnicalExamService
{

    public function storeData($validatedData)
    {
        try {
            DB::beginTransaction();
                $setting = new TechnicalExam();
                $setting->date = $validatedData['date'];
                $setting->user_id = Auth::user()->id;
                $setting->save();
                foreach ($validatedData['course_id'] as $courseId) {
                    foreach ($validatedData['branch_id'] as $branchId){
                         $setting = TExamDetail::firsOrNew(['technical_exam_id' => $setting->id, 'course_id' => $courseId, 'branch_id' => $branchId]);
                         $setting->save();
                         foreach ($validatedData['start_time'] as $index => $value) {
                             $examTimeSlot = new TExamTimeSlot();
                             $examTimeSlot->start_time = $value;
                             $examTimeSlot->end_time = $validatedData['end_time'][$index];
                             $examTimeSlot->save();
                         }
                    }
             }
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
