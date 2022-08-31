<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchCourseMaterialRequest;
use App\Models\BatchCourseMaterial as Model;
use App\Models\Batch;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Services\AdmissionService;
use App\Services\BatchCourseMaterial;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\AssignOp\Mod;

class BatchCourseMaterialController extends Controller
{
     protected $view = 'admin.batch_course_material.';
        protected $redirect = 'batch-course-materials';
            protected $batchCourseMaterial;

    public function __construct(BatchCourseMaterial $service)
    {
        $this->batchCourseMaterial = $service;
    }

        public function index()
        {
//            $settings = Batch::whereHas('batch_course_materials')->orderBy('id','desc')->paginate(config('custom.per_page'));
            $settings = $this->batchCourseMaterial->search();
            return view($this->view.'index',compact('settings'));
        }

        public function create()
        {
            $courses = Course::where('status',1)->get();
            $course_materials = CourseMaterial::all();
            return view($this->view.'create',compact('courses','course_materials'));
        }

        public function store(BatchCourseMaterialRequest $request)
        {
            $validatedData = $request->validated();
            $this->batchCourseMaterial->storeData($validatedData);
            Session::flash('success','Batch Material  has been created!');
            return redirect($this->redirect);
        }

    public function getBatch($course_id)
    {
        $courses = Course::findorfail($course_id);
        $settings = $courses->batches->where('status',array_search('Active',config('custom.status')));
        $course_materials = $courses->course_materials->where('status',array_search('Active',config('custom.status')));
       $returnHtml = view($this->view.'batch-dom',['settings'=>$settings])->render();
       $returnHtmlMaterial = view($this->view.'course_material_dom',['course_materials'=>$course_materials])->render();
        return response()->json(array('success'=>true,'html'=>$returnHtml,'html_material' => $returnHtmlMaterial));
        }
        public function edit($batch_id)
        {
            $setting = Batch::findOrFail($batch_id);
            $courses = Course::where('status',1)->get();
            $course_materials = $setting->time_slot->course->course_materials->where('status',array_search('Active',config('custom.status')));
            $batches = Batch::where('status',1)->get();
            $batch_course_materials = $setting->batch_course_materials;
            return view($this->view.'edit',compact('courses','setting','course_materials','batches','batch_course_materials'));
        }

        public function update(BatchCourseMaterialRequest $request, $batch_id)
        {
            $validatedData = $request->validated();
            $this->batchCourseMaterial->updateData($validatedData,$batch_id);
            Session::flash('success','Course has been updated!');
            return redirect($this->redirect);
        }

        public function show($batch_id)
        {
            $batch = Batch::findOrFail($batch_id);
            $settings = $batch->batch_course_materials;
            return view($this->view.'show',compact('settings','batch'));
        }
}
