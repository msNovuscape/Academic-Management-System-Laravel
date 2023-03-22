<?php
namespace App\Services\TechnicalExam;

use App\Models\Course;
use App\Models\TechnicalExam;
use App\Models\TechnicalExamTimeslot;
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
                $setting->status = $validatedData['status'];
                $setting->exam_type = $validatedData['exam_type'];
                $setting->user_id = Auth::user()->id;
                $setting->save();
                dd($validatedData['course_ids']);
                $setting->courses()->attach($validatedData['course_ids']);
                $setting->timeslots()->attach($validatedData['timeslot_ids']);
                if($validatedData['examp_type'] == '2' && $validatedData['branch_ids'] !== null ){
                    $setting->branches()->attach($validatedData['branchs_ids']);
                }


                // foreach ($validatedData['course_ids'] as $courseId) {
                //     $setting->attach($course)
                //     foreach ($validatedData['branch_ids'] as $branchId){
                //          $setting = TExamDetail::firsOrNew(['technical_exam_id' => $setting->id, 'course_id' => $courseId, 'branch_id' => $branchId]);
                //          $setting->save();
                //          foreach ($validatedData['timeslot_ids'] as $index => $value) {
                //              $examTimeSlot = new TechnicalExamTimeslot();
                //              $examTimeSlot->start_time = $value;
                //              $examTimeSlot->end_time = $validatedData['end_time'][$index];
                //              $examTimeSlot->save();
                //         }
                //     }
                // }
            DB::commit();
            return $setting;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
