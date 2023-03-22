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
    public function search()
    {
        $settings = TechnicalExam::orderBy('id','desc')->with('courses','technical_exam_timeslots','branches');
        if(request('name')){
            $key = \request('name');
            $settings = $settings->where('name','like','%'.$key.'%')
                                ->orWhere('code','like','%'.$key.'%');
        }
        return $settings->paginate(config('custom.per_page'));
    }

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
                $setting->courses()->attach($validatedData['course_ids']);
                $setting->technical_exam_timeslots()->attach($validatedData['timeslot_ids']);
                if($validatedData['exam_type'] == '2' && $validatedData['branch_ids'] !== null ){
                    $setting->branches()->attach($validatedData['branch_ids']);
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

    public function viewData($id){
        $data = TechnicalExam::with('courses','branches','technical_exam_timeslots')->findOrFail($id);
        return $data;
    }
}
