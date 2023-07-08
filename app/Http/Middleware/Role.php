<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //admin role=1
        //user role=0
        if(auth()->check())
        {
            if(auth()->user()->role=='1'){
                return $next($request);
            }
            else{
                //return to_route('user.home');
                return redirect('user/home')->with('message','Acceso denegado, no cuenta con permisos suficientes');
            } 
        }else{
            //return to_route('user.home');
            return redirect('user/home');
        }
        
        return $next($request);
    }
}
