<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoomLinkRequest;
use App\Models\Course;
use App\Models\ZoomLink;
use App\Services\ZoomLinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ZoomLinkController extends Controller
{
    protected $view = 'admin.zoom_link.';
    protected $redirect = 'zoom-links';
    protected $zoomLinkService;
    public function __construct(ZoomLinkService $service)
    {
        $this->zoomLinkService = $service;
    }

    public function index()
    {

        $settings = ZoomLink::paginate(config('custom.per_page'));
        return view($this->view.'index', compact('settings'));
    }

    public function create()
    {
        $courses = Course::where('status', 1)->get();
        return view($this->view.'create', compact('courses'));
    }

    public function store(ZoomLinkRequest $request)
    {
        $validateData = $request->validated();
        $this->zoomLinkService->storeData($validateData);
        Session::flash('success', 'Zoom link is added!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $courses = Course::where('status', 1)->get();
        $setting = ZoomLink::findOrFail($id);
        return view($this->view.'edit', compact('setting', 'courses'));
    }

    public function update(ZoomLinkRequest $request, $id)
    {
        $validateData = $request->validated();
        $this->zoomLinkService->updateData($validateData, $id);
        Session::flash('success', 'Zoom link is updated!');
        return redirect($this->redirect);
    }

    public function studentZoomLink()
    {
        $batch = Auth::user()->admission->batch;
        if ($batch->start_date <= date('Y-m-d') && $batch->end_date >= date('Y-m-d')) {
            $settings = ZoomLink::where('course_id', Auth::user()->admission->batch->time_slot->course_id)
                                ->orderBy('id', 'desc')->get();
        } else {
            $settings = [];
        }
        if (Auth::user()->admission->sCounselling) {
            $counsellingLink = ZoomLink::whereHas('course', function ($q) {
                $q->where('name', 'Career Counselling');
            })->get();
            if ($counsellingLink->count() > 0) {
                $counsellingLink = $counsellingLink->first();
                return view('student.zoom_link.index', compact('settings', 'counsellingLink'));
            }
        }
        return view('student.zoom_link.index', compact('settings'));
    }

}
