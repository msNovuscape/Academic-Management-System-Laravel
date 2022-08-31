<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoreTimeTableRequest;
use App\Models\TimeTable;
use App\Models\TimeTable as Model;
use App\Http\Controllers\Controller;
use App\Services\TimeTableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimeTableController extends Controller
{
    //
    protected $view = 'admin.timetable.';
    protected $redirect = 'timetables';
    private $TimeTable;

    public function __construct(TimeTableService $service){
        $this->TimeTable =$service;
    }

    public function index(){
        $settings = $this->TimeTable->search();
        return view($this->view.'index',compact('settings'));
    }

    public function store(StoreTimeTableRequest $request){
      //  dd($request);
        $validateData = $request->validated();
        $this->TimeTable->storeData($validateData);
        Session::flash('success','Time Table has been created!');
        return redirect($this->redirect);

    }

    public function edit($id){
      //  return view($this->view.'edit');
    }



    public function update(StoreTimeTableRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->TimeTable->updateData($validatedData,$id);
        Session::flash('success','TimeTable has been updated!');
        return redirect($this->redirect);
    }
}
