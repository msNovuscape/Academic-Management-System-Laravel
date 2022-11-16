<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoomLinkBatchRequest;
use App\Models\Batch;
use App\Models\Course;
use App\Models\ZoomLinkBatch;
use App\Services\ZoomLinkBatchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ZoomLinkBatchController extends Controller
{
    protected $view = 'admin.zoom_link_batch.';
    protected $redirect = 'zoom-links-batch';
    protected $zoomLinkBatchService;

    public function __construct(ZoomLinkBatchService $service)
    {
        $this->zoomLinkBatchService = $service;
    }

    public function index()
    {
        $settings = $this->zoomLinkBatchService->search();
        return view($this->view.'index', compact('settings'));
    }

    public function create()
    {
        $courses = Course::where('name', '!=', 'Career Counselling')->where('status', 1)->get();
        return view($this->view.'create', compact('courses'));
    }

    public function store(ZoomLinkBatchRequest $request)
    {
        $validatedData = $request->validated();
        $this->zoomLinkBatchService->storeData($validatedData);
        Session::flash('success', 'Zoom Link has been assigned!');
        return redirect($this->redirect);
    }

    public function getBatch($course_id)
    {
        $courses = Course::findorfail($course_id);
        $settings = $courses->batches->where('status', array_search('Active', config('custom.status')));
        $course_materials = $courses->zoomLinks->where('status', array_search('Active', config('custom.status')));
        $returnHtml = view($this->view.'batch-dom', ['settings'=>$settings])->render();
        $returnHtmlMaterial = view($this->view.'course_material_dom', ['course_materials'=>$course_materials])->render();
        return response()->json(array('success'=>true,'html'=>$returnHtml,'html_material' => $returnHtmlMaterial));
    }

    public function edit($id)
    {
        $setting = ZoomLinkBatch::findOrFail($id);
        $courses = Course::where('name', '!=', 'Career Counselling')->where('status', 1)->get();
        $course_materials = $setting->zoomLink->course->zoomLinks->where('status', array_search('Active', config('custom.status')));
        $batches = $setting->zoomLink->course->batches->where('status', 1);
        return view($this->view.'edit', compact('courses', 'setting', 'batches', 'course_materials'));
    }

    public function update(ZoomLinkBatchRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->zoomLinkBatchService->updateData($validatedData, $id);
        Session::flash('success', 'Assigned zoom link has been updated!');
        return redirect($this->redirect);
    }

    public function show($id)
    {
        $setting = ZoomLinkBatch::findOrFail($id);
        return view($this->view.'show', compact('setting'));
    }

    public function delete($id)
    {
       $setting = ZoomLinkBatch::findOrFail($id);
       $setting->delete();
       Session::flash('success', 'Assigned zoom link is deleted!');
       return redirect($this->redirect);
    }

    public function show111($id)
    {
        dd(999999);
    }
}
