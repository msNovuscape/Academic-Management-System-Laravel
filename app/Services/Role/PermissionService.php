<?php
namespace App\Services\Role;

use App\Models\User;
use App\Models\UserPermission;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

class PermissionService
{
    public function search()
    {
        $settings = UserRole:: orderBy('id', 'desc');
        if (request('name')) {
            $key = \request('name');
            $settings = $settings->whereHas('user', function ($u) use ($key) {
                $u->where('name', 'like', '%'.$key.'%');
            });
        }
        $settings = $settings->paginate(config('custom.per_page'));
        return $settings;
    }

    public function storeData($validateData)
    {
        try {
            DB::beginTransaction();
                if (request('role_id') == null && $validateData['permission'] == 2) {
                   return false;
                } else {
                    $user = User::findOrFail(request('user_id'));
                    //for assign role
                    if (request('role_id')) {
                        $userRole = UserRole::firstOrNew(['user_id' => $user->id, 'role_id' => request('role_id')]);
                        $userRole->save();
                    }
                    //for assign  personal permission
                    if (request('permission') && request('permission') == 1) {
                        if (\request('create_p')) {
                            foreach (\request('create_p') as $item => $value) {
                                $userPermissionCreate = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('create_p')[$item]]);
                                $userPermissionCreate->save();

                            }
                        }

                        if (\request('show_p')) {
                            foreach (\request('show_p') as $it => $va) {
                                $userPermissionShow = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('show_p')[$it]]);
                                $userPermissionShow->save();
                            }
                        }

                        if (\request('update_p')) {
                            foreach (\request('update_p') as $i => $v) {
                                $userPermissionUpdate = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('update_p')[$i]]);
                                $userPermissionUpdate->save();
                            }
                        }

                        if (\request('delete_p')) {
                            foreach (\request('delete_p') as $item1 => $value1) {
                                $userPermissionDelete = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('delete_p')[$item1]]);
                                $userPermissionDelete->save();
                            }
                        }

                        if (\request('report_p')) {
                            foreach (\request('report_p') as $index => $val) {
                                $userPermissionReport = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('report_p')[$index]]);
                                $userPermissionReport->save();
                            }
                        }

                    }

                }
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function updateData($validateData, $userRole)
    {
        try {
            DB::beginTransaction();
                if (request('role_id') == null && $validateData['permission'] == 2) {
                   return false;
                } else {
                    $user = User::findOrFail(request('user_id'));
                    //for update role
                    if (request('role_id')) {
                        $userRole->role_id = request('role_id');
                        $userRole->save();
                    }
                    //for update  personal permission
                    if (request('permission') && request('permission') == 1) {
                        //delete previous permissions
                        if ($user->userPermissions->count() > 0) {
                            $user->userPermissions()->delete();
                        }
                        if (\request('create_p')) {
                            foreach (\request('create_p') as $item => $value) {
                                $userPermissionCreate = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('create_p')[$item]]);
                                $userPermissionCreate->save();

                            }
                        }

                        if (\request('show_p')) {
                            foreach (\request('show_p') as $it => $va) {
                                $userPermissionShow = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('show_p')[$it]]);
                                $userPermissionShow->save();
                            }
                        }

                        if (\request('update_p')) {
                            foreach (\request('update_p') as $i => $v) {
                                $userPermissionUpdate = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('update_p')[$i]]);
                                $userPermissionUpdate->save();
                            }
                        }

                        if (\request('delete_p')) {
                            foreach (\request('delete_p') as $item1 => $value1) {
                                $userPermissionDelete = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('delete_p')[$item1]]);
                                $userPermissionDelete->save();
                            }
                        }

                        if (\request('report_p')) {
                            foreach (\request('report_p') as $index => $val) {
                                $userPermissionReport = UserPermission::firstOrNew(['user_id' => $user->id,'permission_id' => \request('report_p')[$index]]);
                                $userPermissionReport->save();
                            }
                        }

                    } elseif (request('permission') && request('permission') == 2){
                        if ($user->userPermissions->count() > 0) {
                            $user->userPermissions()->delete();
                        }
                    }

                }
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
