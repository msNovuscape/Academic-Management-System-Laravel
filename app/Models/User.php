<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admission()
    {
        return $this->hasOne(Admission::class);
    }

    public function student()
    {
        return $this->hasOneThrough(Student::class,Admission::class);
    }

    public function student_password()
    {
       return $this->hasOne(StudentPassword::class);
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function userTeachers()
    {
        return $this->hasMany(UserTeacher::class);
    }
    public function userTeachersWithActiveCourse()
    {
        return $this->hasMany(UserTeacher::class)->where('status', '1');
    }

    public function userPermissions()
    {
        return $this->hasMany(UserPermission::class);
    }

    //functions for  user roles and permissions
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')->whereNull('user_roles.deleted_at');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions')->whereNull('user_permissions.deleted_at');
    }


    //    return user role permissions
    public function getUserRolesPermissions($route)
    {
        //return user permissions by roles
        $user = Auth::user();
        $hasRole = $user->roles()->whereHas('permissions', function ($q) use ($route) {
            $q->where('slug', $route);
        })->count();
        if ($hasRole > 0) {
            return $hasRole;
        }
        //return user personal permissions
        $hasPermission = $user->permissions()->where('slug', $route)->count();
        if ($hasPermission > 0) {
            return $hasPermission;
        }
    }

    public function hasResourcePermission($route)
    {
        switch (request()->method()) {
            case 'GET':
                if (request()->segment('3') == 'edit') {
                    $route = "update_" . $route;
                } elseif (is_numeric(request()->segment('2'))) {
                    $route = "show_" . $route;
                } elseif (request()->segment('2') == 'create') {
                    $route = "create_" . $route;
                } else {
                    $route = "show_" . $route;
                }
                break;
            case 'POST':
                $route = "create_" . $route;
                break;
            case 'PUT':
                $route = "update_" . $route;
                break;
            case 'DELETE':
                $route = "delete_" . $route;
                break;
            case 'PATCH':
                $route .= "update_" . $route;
                break;
        }

        if (Auth::user()) {
            $hasRole = $this->getUserRolesPermissions($route);
            if ($hasRole > 0) {
                return $hasRole;
            }
            $hasPermission = $this->getUserRolesPermissions($route);
            if ($hasPermission > 0) {
                return $hasPermission;
            }
        }

    }

    //menu permission
    public function menuPermission($route)
    {
        $check_routes = ['create_'.$route,'show_'.$route,'update_'.$route,'delete_'.$route,'report_'.$route];
        if (Auth::user()) {
            foreach ($check_routes as $check_route) {
                $hasRole = self::getUserRolesPermissions($check_route);
                if ($hasRole > 0) {
                    return $hasRole;
                }
                $hasPermission = self::getUserRolesPermissions($check_route);
                if ($hasPermission > 0) {
                    return $hasPermission;
                }
            }

        }
    }

    public function customMenuPermission($route)
    {
        $hasRole = self::getUserRolesPermissions($route);
        if ($hasRole > 0) {
            return $hasRole;
        }
        $hasPermission = self::getUserRolesPermissions($route);
        if ($hasPermission > 0) {
            return $hasPermission;
        }
    }

    public function crudPermission($route)
    {
        $hasRole = self::getUserRolesPermissions($route);
        if ($hasRole > 0) {
            return $hasRole;
        }
        $hasPermission = self::getUserRolesPermissions($route);
        if ($hasPermission > 0) {
            return $hasPermission;
        }
    }


}
