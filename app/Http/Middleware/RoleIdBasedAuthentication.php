<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleIdBasedAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
        $allowed = true;
        $UserId = $request->route()->user->id;
        $view_edit_roleName = User::find($UserId)->roles->first()->role;
        $loggedIn_user_roleName = Auth::user()->roles->first()->role;

        if($loggedIn_user_roleName != 'SUPER-ADMIN'){
            if($request->is('users/'.$UserId.'/edit')){
                if(Role::where('role', $loggedIn_user_roleName)->first()->permissions->contains('permission', $view_edit_roleName.'-EDIT')) {
                    $allowed = true;
                 }
                 else {
                    $allowed = false;
                }
            }
            elseif($request->is('users/'.$UserId)) {
                if(Role::where('role', $loggedIn_user_roleName)->first()->permissions->contains('permission', $view_edit_roleName.'-VIEW')) {
                    $allowed = true;
                 }
                 else {
                    $allowed = false;
                }
            }
        }

        if($allowed == true) {
            return $next($request);
        }
        else {
            return redirect()->route('401');
        }
       // echo $request->route()->url();die;
       // return $next($request);
    }
}
