<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    protected $view = 'admin.branch.';
    protected $redirect = 'branches';

    public function index()
    {
        $settings = Branch::orderBy('id', 'asc');
        if (request('name')) {
            $key = \request('name');
            $settings = $settings->where('name', 'LIKE', '%'.$key.'%');
        }
        $settings = $settings->paginate(config('custom.per_page'));
        return view($this->view.'index', compact('settings'));
    }

    public function create()
    {
        return view($this->view.'create');
    }

    public function store(BranchRequest $request)
    {
        $validatedData = $request->validated();
        Branch::create($validatedData);
        Session::flash('success', 'Branch has been created!');
        return redirect($this->redirect);
    }

    public function edit($id)
    {
        $setting = Branch::findOrFail($id);
        return view($this->view.'edit', compact('setting'));
    }

    public function update(BranchRequest $request, $id)
    {
        $validatedData = $request->validated();
        $setting = Branch::findOrFail($id);
        $setting->update($validatedData);
        Session::flash('success', 'Branch has been updated!');
        return redirect($this->redirect);
    }
}
