<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\adminpermit;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminpermit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if(!empty(Auth::user())){

            if(url()->current()== route('ui_register') || url()->current() == route('ui_register') || url()->current() == route('ui_login')){
                return back();
            }



        if(Auth::user()->role == 'user'){
            return back();
         }
         return $next($request);
          }

          return $next($request);

    }
}
