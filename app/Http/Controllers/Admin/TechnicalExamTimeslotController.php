<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalExam\TechnicalExamTimeslotRequest;
use App\Models\TechnicalExamTimeslot;
use App\Services\TechnicalExam\TechnicalExamTimeslotService;
use Illuminate\Support\Facades\Session;

class TechnicalExamTimeslotController extends Controller
{
    protected $view = 'admin.technical_exam_timeslot.';
    private $timeslotService;
    protected $redirect = 'technical_exam_timeslots';

    public function __construct(TechnicalExamTimeslotService $service)
    {
        $this->timeslotService = $service;
    }
    public function index(){
        $timeslots = $this->timeslotService->search();
        return view($this->view.'index',compact('timeslots'));
    }

    public function create(){

        return view($this->view.'create');
    }

    public function store(TechnicalExamTimeslotRequest $request){
        $validatedData = $request->validated();
        $this->timeslotService->storeData($validatedData);
        Session::flash('success','TimeSlot has been created!');
        return redirect($this->redirect);

    }

    public function update(TechnicalExamTimeslotRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->timeslotService->updateData($validatedData, $id);
        Session::flash('success', 'TimeSlot has been updated!');
        return redirect($this->redirect);
    }

    public function delete($id)
    {
        $setting = TechnicalExamTimeslot::findOrFail($id);
        // if ($setting->time_slots->count() > 0) {
        //    Session::flash('custom_error', 'The Course has been assigned to Time slot!');
        // }else {
            $setting->delete();
            Session::flash('success', 'The Timeslot has been delete!');
        // }
        return redirect($this->redirect);
    }


}
