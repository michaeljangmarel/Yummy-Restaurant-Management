<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class url
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!empty(Auth::user())){
            if(url()->current() == route('ui_login') || url()->current() == route('ui_register') || url()->current() == route('ui_register')){
                return back();
            }
        }
        return $next($request);
    }
}
