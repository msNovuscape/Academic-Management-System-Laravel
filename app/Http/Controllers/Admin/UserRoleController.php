<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\PermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Services\Role\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserRoleController extends Controller
{
    protected $view = 'admin.roles.permission.';
    protected $redirect = 'permissions';
    protected $permissionServie;

    public function __construct(PermissionService $service)
    {
        $this->permissionServie = $service;
    }

    public function index()
    {
        $settings = $this->permissionServie->search();
        return view($this->view.'index', compact('settings'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $settings = DB::table('permissions')->select('table_name', 'common_name')->distinct()->get();
        $users = User::where('user_type', '!=', '3')->where('status', '1')->get();
        $roles = Role::all();
        return view($this->view.'create', compact('permissions', 'settings', 'users', 'roles'));
    }

    public function store(PermissionRequest $request)
    {
        $validateData = $request->validated();
        $setting = $this->permissionServie->storeData($validateData);
        if ($setting == false) {
            Session::flash('custom_error', 'Role and Personal  permission should not be empty at same time!');
            return redirect('permissions/create');
        }else {
            Session::flash('success', 'Role has been assigned!');
            return redirect($this->redirect);
        }

    }
}
