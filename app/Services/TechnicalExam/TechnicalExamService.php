<?php
namespace App\Services\TechnicalExam;

use App\Models\Course;
use App\Models\TechnicalExam;
use App\Models\TExamTimeSlot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TechnicalExamService
{

    public function storeData($validatedData)
    {
        try {
            DB::beginTransaction();
             foreach ($validatedData['course_id'] as $courseId) {
                 foreach ($validatedData['branch_id'] as $branchId){
                     $setting = TechnicalExam::firsOrNew(['date' => $validatedData['date'], 'course_id' => $courseId, 'branch_id']);
                     $setting->user_id = Auth::user()->id;
                     $setting->save();
                     foreach ($validatedData['start_time'] as $index => $value) {
                         $examTimeSlot = new TExamTimeSlot();
                         $examTimeSlot->start_time = $value;
                         $examTimeSlot->start_time = $validatedData['end_time'][$index];
                         $examTimeSlot->save();
                     }
                 }
             }
            DB::commit();
            return 'a';
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
