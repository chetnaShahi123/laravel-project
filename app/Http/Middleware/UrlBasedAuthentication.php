<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class UrlBasedAuthentication
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
        $loggedIn_user_roleName = Auth::user()->roles->first()->role;
        $flag = true;
        if($loggedIn_user_roleName != 'SUPER-ADMIN'){
            $create_roleName = $request->route()->roleName;
            if(Role::where('role', $loggedIn_user_roleName)->first()->permissions->contains('permission', $create_roleName.'-CREATE')) {
               $flag = true;
            }
            else {
                $flag = false;
            }
        }
        
        if($flag == true) {
            return $next($request);
        }
        else {
            return redirect()->route('401');
        }
    }
}
