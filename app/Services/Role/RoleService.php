<?php
namespace App\Services\Role;

use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Support\Facades\DB;

class RoleService
{

    public function search()
    {
        $settings = Role:: orderBy('id', 'desc');
        if (request('name')) {
            $key = \request('name');
            $settings = $settings->whereHas('user', function ($u) use ($key) {
                $u->where('name', 'like', '%'.$key.'%');
            })->orWhere('student_id', 'like', '%'.$key.'%');
        }
        $settings = $settings->paginate(config('custom.per_page'));
        return $settings;
    }

    public function storeData($validateData)
    {
        try {
            DB::beginTransaction();
                $role = new Role();
                $role->name = $validateData['name'];
                $role->save();
            if (\request('create_p')) {
                foreach (\request('create_p') as $item => $value) {
                    $rolePermissionCreate = new RolePermission();
                    $rolePermissionCreate->role_id = $role->id;
                    $rolePermissionCreate->permission_id = \request('create_p')[$item];
                    $rolePermissionCreate->save();
                }
            }
            if (\request('show_p')) {
                foreach (\request('show_p') as $it => $va) {
                    $rolePermissionShow = new RolePermission();
                    $rolePermissionShow->role_id = $role->id;
                    $rolePermissionShow->permission_id = \request('show_p')[$it];
                    $rolePermissionShow->save();
                }
            }
            if (\request('update_p')) {
                foreach (\request('update_p') as $i => $v) {
                    $rolePermissionUpdate = new RolePermission();
                    $rolePermissionUpdate->role_id = $role->id;
                    $rolePermissionUpdate->permission_id = \request('update_p')[$i];
                    $rolePermissionUpdate->save();
                }
            }
            if (\request('report_p')) {
                foreach (\request('report_p') as $index => $val) {
                    $rolePermissionReport = new RolePermission();
                    $rolePermissionReport->role_id = $role->id;
                    $rolePermissionReport->permission_id = \request('report_p')[$index];
                    $rolePermissionReport->save();
                }
            }
            if (\request('delete_p')) {
                foreach (\request('delete_p') as $item1 => $value1) {
                    $rolePermissionDelete = new RolePermission();
                    $rolePermissionDelete->role_id = $role->id;
                    $rolePermissionDelete->permission_id = \request('delete_p')[$item1];
                    $rolePermissionDelete->save();
                }
            }
            DB::commit();
            return $role;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateData($validateData, $id)
    {
        try {
            DB::beginTransaction();
            $role = Role::findOrFail($id);
            $role->name = $validateData['name'];
            $role->save();
            $role->role_premissions()->delete();
            if (\request('create_p')) {
                foreach (\request('create_p') as $item => $value) {
                    $rolePermissionCreate = new RolePermission();
                    $rolePermissionCreate->role_id = $role->id;
                    $rolePermissionCreate->permission_id = \request('create_p')[$item];
                    $rolePermissionCreate->save();
                }
            }
            if (\request('show_p')) {
                foreach (\request('show_p') as $it => $va) {
                    $rolePermissionShow = new RolePermission();
                    $rolePermissionShow->role_id = $role->id;
                    $rolePermissionShow->permission_id = \request('show_p')[$it];
                    $rolePermissionShow->save();
                }
            }
            if (\request('update_p')) {
                foreach (\request('update_p') as $i => $v) {
                    $rolePermissionUpdate = new RolePermission();
                    $rolePermissionUpdate->role_id = $role->id;
                    $rolePermissionUpdate->permission_id = \request('update_p')[$i];
                    $rolePermissionUpdate->save();
                }
            }
            if (\request('report_p')) {
                foreach (\request('report_p') as $index => $val) {
                    $rolePermissionReport = new RolePermission();
                    $rolePermissionReport->role_id = $role->id;
                    $rolePermissionReport->permission_id = \request('report_p')[$index];
                    $rolePermissionReport->save();
                }
            }
            if (\request('delete_p')) {
                foreach (\request('delete_p') as $item1 => $value1) {
                    $rolePermissionDelete = new RolePermission();
                    $rolePermissionDelete->role_id = $role->id;
                    $rolePermissionDelete->permission_id = \request('delete_p')[$item1];
                    $rolePermissionDelete->save();
                }
            }
            DB::commit();
            return $role;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
