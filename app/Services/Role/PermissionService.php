<?php
namespace App\Services\Role;

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
            })->orWhere('student_id', 'like', '%'.$key.'%');
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

                }
            DB::commit();
            return 'a';
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
