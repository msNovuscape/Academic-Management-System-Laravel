<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FiscalYearRequest;
use App\Models\FiscalYear as Model;
use App\Services\FiscalYearService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FiscalYearController extends Controller
{

    protected $view = 'admin.fiscal_year.';
    protected $redirect = 'fiscal-years';
    private $fiscal_year_service;

    public function __construct(FiscalYearService $service) {
        $this->fiscal_year_service = $service;
    }
    public function index()
    {
        $settings = Model::orderBy('id', 'asc');
        if (request('name')) {
            $key = \request('name');
            $settings = $settings->where('name', 'like', '%'.$key.'%');
        }
        $settings = $settings->paginate(config('custom.per_page'));
        return view($this->view.'index', compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(FiscalYearRequest $request)
    {
        $validatedData = $request->validated();
        $this->fiscal_year_service->storeData($validatedData);
        Session::flash('success', 'Fiscal Year has been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = Model::findOrFail($id);
        return view($this->view.'edit', compact('setting'));
    }

    public function update(FiscalYearRequest $request, $id)
    {
        $validatedData = $request->validated();
        $this->fiscal_year_service->updateData($validatedData,$id);
        Session::flash('success', 'Fiscal Year has been updated!');
        return redirect($this->redirect);
    }
}
