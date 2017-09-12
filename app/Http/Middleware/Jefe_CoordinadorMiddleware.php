<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Jefe_CoordinadorMiddleware
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
      foreach (Auth::user()->rol as $role) {
        if ($role->nombre=='jefe' | $role->nombre=='coordinador_Sups'){
        return $next($request);
        }
      }
        return redirect('permisoDenegado');
    }

}