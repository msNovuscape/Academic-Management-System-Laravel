<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchRequest;
use App\Models\Batch;
use App\Models\Batch as Model;
use App\Models\Course;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Session;
use App\Services\BatchServices;

class BatchController extends Controller
{

    protected $view = 'admin.batch.';
    protected $redirect = 'batches';
    private $batchService;

    public function __construct(BatchServices $service){
        $this->batchService = $service;
    }
    public function index()
    {
        $courses = Course::where('status',1)->get();
        $settings = $this->batchService->search();
        return view($this->view.'index',compact('settings','courses'));
    }

    public function create()
    {
        $setting_courses = Course::where('status',1)->get();
        return view($this->view.'create',compact('setting_courses'));
    }

    public function get_courses($course_id){
        //dd($course_id);
        $course = Course::findorfail($course_id);
        $settings = $course->time_slots->where('course_id',$course->id)->where('status',array_search('Active',config('custom.status')));
        //dd($settings[0]);
        //dd($settings);
        $returnHtml = view($this->view.'courses_dom',['settings' => $settings])->render();
        return response()->json(array('success' =>true, 'html' => $returnHtml));
    }

    public function store(BatchRequest $request)
    {
        $validatedData = $request->validated();
        $this->batchService->storeData($validatedData);
        Session::flash('success', 'Batch has been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = Model::findOrFail($id);
        $setting_courses = Course::where('status',1)->get();
        $time_slots = TimeSlot::whereHas('course',function ($q) use ($setting){
                                $q->where('id',$setting->time_slot->course_id);
                    })->get();
        return view($this->view.'edit',compact('setting','setting_courses','time_slots'));
    }

    public function update(BatchRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->batchService->updateData($validatedData, $id);
        Session::flash('success', 'Batch has been updated!');
        return redirect($this->redirect);
    }

    public function delete($id)
    {
        $setting = Batch::findOrFail($id);
        if ($setting->admissions->count() > 0) {
            Session::flash('custom_error', 'The Batch has been assigned to Student!');
        }else {
            $setting->delete();
            Session::flash('success', 'The Batch has been delete!');
        }
        return redirect($this->redirect);
    }
}
