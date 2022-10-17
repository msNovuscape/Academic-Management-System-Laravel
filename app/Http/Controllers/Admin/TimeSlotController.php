<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoreTimeSlotRequest;
use App\Http\Requests\StoreTimeTableRequest;
use App\Models\Branch;
use App\Models\Course;
use App\Models\TimeSlot;
use App\Models\TimeSlot as Model;
use App\Http\Controllers\Controller;
use App\Models\TimeTable;
use App\Services\TimeSlotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimeSlotController extends Controller
{
    //
    protected $view = 'admin.timeslot.';
    protected $redirect = 'timeslots';
    private $Timeslot;

    public function __construct(TimeSlotService $service)
    {
        $this->Timeslot =$service;
    }

    public function index(){
        $settings = $this->Timeslot->search();
        $courses = Course::where('status',1)->get();
        $time_tables = TimeTable::where('status',1)->get();
        $branches = Branch::where('status',1)->get();
        return view($this->view.'index',compact('settings','courses','time_tables','branches'));
    }

    public function store(StoreTimeSlotRequest $request){
        $validateData = $request->validated();
        $this->Timeslot->storeData($validateData);
        Session::flash('success','Time Slot has been created!');
        return redirect($this->redirect);
        //$requestData = $request->all();
        //dd($requestData);



    }

    public function update(StoreTimeSlotRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->Timeslot->updateData($validatedData,$id);
        Session::flash('success','Time Slot has been Updated!');
        return redirect($this->redirect);
    }

    public function delete($id)
    {
        $setting = TimeSlot::findOrFail($id);
        if ($setting->batches->count() > 0) {
            Session::flash('custom_error', 'The time slot is assigned to batch!');
        }else {

            $setting->delete();
            Session::flash('success', 'The time slot has been delete!');
        }
        return redirect($this->redirect);
    }
}
