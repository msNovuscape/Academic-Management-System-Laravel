<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnicalExamLocation;
use App\Services\TechnicalExam\TechnicalExamLocationService;
use Illuminate\Contracts\Session\Session;
use App\Http\Requests\TechnicalExam\TechnicalExamLocationRequest;


class TechnicalExamLocationController extends Controller
{

    protected $view = 'admin.technical_exam_location.';
    protected $redirect = 'technical_exam_locations';
    private $locationService;

    public function __construct(TechnicalExamLocationService $service)
    {
        $this->locationService = $service;
    }

    public function index()
    {
        $settings = $this->locationService->search();
        return view($this->view.'index',compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(TechnicalExamLocationRequest $request)
    {
        $validatedData = $request->validated();
        $this->locationService->storeData($validatedData);
        Session::flash('success','TechnicalExamLocation has been created!');
        return redirect($this->redirect);
    }

    public function edit()
    {

    }

    public function update(TechnicalExamLocationRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->locationService->updateData($validatedData, $id);
        Session::flash('success', 'Location has been updated!');
        return redirect($this->redirect);
    }

    public function delete($id)
    {
        $setting = TechnicalExamLocation::findOrFail($id);
        // if ($setting->time_slots->count() > 0) {
        //    Session::flash('custom_error', 'The Course has been assigned to Time slot!');
        // }else {
            $setting->delete();
            Session::flash('success', 'The Course has been delete!');
        // }
        return redirect($this->redirect);
    }


}

