<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Role\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $view = 'admin.roles.';
    protected $redirect = 'roles';
    protected $roleServie;

    public function __construct(RoleService $service)
    {
        $this->roleServie = $service;
    }

    public function index()
    {
        $settings = $this->roleServie->search();
        return view($this->view.'index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $settings = DB::table('permissions')->select('table_name', 'common_name')->distinct()->get();
        return view($this->view.'create', compact('permissions', 'settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $validateData = $request->validated();
        $this->roleServie->storeData($validateData);
        Session::flash('success', 'Role has been created!');
        return redirect($this->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $settings = DB::table('permissions')->select('table_name', 'common_name')->distinct()->get();
        return view($this->view.'show', compact('permissions', 'settings', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $settings = DB::table('permissions')->select('table_name', 'common_name')->distinct()->get();
        return view($this->view.'edit', compact('permissions', 'settings', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $validateData = $request->validated();
        $this->roleServie->updateData($validateData, $id);
        Session::flash('success', 'Role has been updated!');
        return redirect($this->redirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
