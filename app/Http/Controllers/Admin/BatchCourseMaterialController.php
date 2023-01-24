<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BatchCourseMaterialRequest;
use App\Models\BatchCourseMaterial as Model;
use App\Models\Batch;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\CourseModule;
use App\Services\AdmissionService;
use App\Services\BatchCourseMaterial;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            //for tutor
            $courses = Course::whereHas('activeUserTeachers', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->where('status', 1)->get();
        } else {
            $courses = Course::where('status', 1)->get();
        }
        $course_materials = CourseMaterial::all();
        return view($this->view.'create',compact('courses','course_materials'));
    }

    public function store(BatchCourseMaterialRequest $request)
    {
        $validatedData = $request->validated();
        $this->batchCourseMaterial->storeData($validatedData);
        Session::flash('success', 'Batch Material  has been created!');
        return redirect($this->redirect);
    }

    public function getBatch($course_id)
    {
        $courses = Course::findorfail($course_id);
        $settings = $courses->batches->where('status', array_search('Active',config('custom.status')));
        if ($courses->course_modules->count() > 0) {
            $status = 'Yes'; // course has course module
            $returnHtml = view($this->view.'batch-dom', ['settings'=>$settings])->render();
            $returnHtmlModule = view($this->view.'student.module', ['course_modules'=>$courses->course_modules])->render();
            return response()->json(array('success'=>true, 'html'=>$returnHtml, 'html_module'=>$returnHtmlModule,'status' => $status));
        } else {
            $status = 'No';
            $course_materials = $courses->course_materials->where('status',array_search('Active',config('custom.status')));
            $returnHtml = view($this->view.'batch-dom',['settings'=>$settings])->render();
            $returnHtmlMaterial = view($this->view.'course_material_dom',['course_materials'=>$course_materials])->render();
            return response()->json(array('success'=>true,'html'=>$returnHtml,'html_material' => $returnHtmlMaterial, 'status' => $status));
        }

    }

    public function getBatchEdit($course_id)
    {
        $courses = Course::findorfail($course_id);
        $settings = $courses->batches->where('status', array_search('Active', config('custom.status')));
        if ($courses->course_modules->count() > 0) {
            $status = 'Yes'; // course has course module
            $returnHtml = view($this->view.'batch-dom', ['settings'=>$settings])->render();
            $returnHtmlModule = view($this->view.'student.module_update', ['course_modules'=>$courses->course_modules])->render();
            return response()->json(array('success'=>true, 'html'=>$returnHtml, 'html_module'=>$returnHtmlModule,'status' => $status));
        } else {
            $status = 'No';
            $course_materials = $courses->course_materials->where('status',array_search('Active',config('custom.status')));
            $returnHtml = view($this->view.'batch-dom',['settings'=>$settings])->render();
            $returnHtmlMaterial = view($this->view.'course_material_dom',['course_materials'=>$course_materials])->render();
            return response()->json(array('success'=>true,'html'=>$returnHtml,'html_material' => $returnHtmlMaterial, 'status' => $status));
        }

    }
    public function getBatchStudents($batchId)
    {
        $batch = Batch::findorfail($batchId);
        $returnHtmlMaterial = view($this->view.'student.index', ['batch'=>$batch])->render();
        return response()->json(array('success'=>true,'html_material' => $returnHtmlMaterial));

    }
    public function getModuleStudents($batchId, $courseModuleId)
    {
        $batch = Batch::findorfail($batchId);
        $courseModule = CourseModule::findorfail($courseModuleId);
        $returnHtmlMaterial = view($this->view.'student.index_ajax', ['setting'=>$batch, 'courseModule' => $courseModule])->render();
        return response()->json(array('success'=>true,'html_material' => $returnHtmlMaterial));

    }

    public function edit($batch_id)
    {
        $setting = Batch::findOrFail($batch_id);
        if (Auth::user()->user_type == 4 && Auth::user()->userInfo->tutor_status == 1) {
            //for tutor
            $courses = Course::whereHas('activeUserTeachers', function ($q) {
                $q->where('user_id', Auth::user()->id);
            })->where('status', 1)->get();
        } else {
            $courses = Course::where('status', 1)->get();
        }
        $course_materials = $setting->time_slot->course->course_materials->where('status',array_search('Active',config('custom.status')));
        $batches = $setting->time_slot->course->batches->where('status', 1);
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
