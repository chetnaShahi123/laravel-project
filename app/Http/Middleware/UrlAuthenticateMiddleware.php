<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Routing\Route;

class UrlAuthenticateMiddleware
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
        if($request->is('users/*')||$request->is('users')) {
            return $next($request);
        } 
  
        return redirect()->route('401');  //handled by exception handler
    }
}
