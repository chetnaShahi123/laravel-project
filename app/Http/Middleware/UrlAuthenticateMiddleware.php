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
    { //die("djfgd");echo"<pre>";print_r($request);die;
        //echo"<pre>";print_r($request);die;
        // $url = $request->url(); die($url);
        // return $next($request);
        // $uri = $request->path();echo $uri;
        if($request->is('users/*')||$request->is('users')) {
            return $next($request);
        } 
  
        return redirect()->route('401');  //handled by exception handler
        //return $next($request);
    }
}
