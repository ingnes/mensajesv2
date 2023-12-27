<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */ 
    public function handle(Request $request, Closure $next): Response
    {
         foreach (auth()->user()->roles  as $rol) {

            if ($rol->id == 1) {
                return $next($request);
            }
           
         }
         
         return redirect('/');
        
        
    }
}
