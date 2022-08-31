<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\EnrollmentRequest;
use App\Models\Country;
use App\Models\Student as Model;
use App\Services\Student\EnrollmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{

    protected $view = 'admin.quiz.';

    public function index()
    {
        // $settings = Model::paginate(config('custom.per_page'));
        return view($this->view.'index');
    }

}
