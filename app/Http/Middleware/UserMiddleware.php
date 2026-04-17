<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!Auth::check()){
            abort(403,'Silakan Login Terlebih Dahulu');
        }

        if(in_array(Auth::User()->role, $roles)){
            return $next($request);
        }abort(403, 'Akses Ditolak');
        
    }
}
