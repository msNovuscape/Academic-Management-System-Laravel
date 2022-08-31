<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionRequest;
use App\Models\Admission;
use App\Models\Admission as Model;
use App\Models\Batch;
use App\Models\Course;
use App\Models\TimeSlot;
use App\Services\AdmissionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Time;

class PdfController extends Controller
{
    

        protected $view = 'admin.pdf.';
    
        public function index()
        {
            // $settings = Model::paginate(config('custom.per_page'));
            return view($this->view.'index');
        }
    
    }

