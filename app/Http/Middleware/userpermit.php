<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\userpermit;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class userpermit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role == 'admin'){
             return back();
        }
        return $next($request);
    }
}
