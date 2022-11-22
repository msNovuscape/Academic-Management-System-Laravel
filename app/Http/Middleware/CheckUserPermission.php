<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $route)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $hasRole = $user->getUserRolesPermissions($route);
            if ($hasRole > 0) {
                return $next($request);
            } else {
                Session::flash('custom_error', 'Dear '.$user->name.', You are not allowed!');
                return redirect('');
            }
            $hasPermission = $user->getUserRolesPermissions($route);
            if ($hasPermission > 0) {
                return $next($request);
            } else {
                Session::flash('custom_error', 'Dear '.$user->name.', You are not allowed!');
                return redirect('');
            }
        }
        return redirect('');
    }
}
