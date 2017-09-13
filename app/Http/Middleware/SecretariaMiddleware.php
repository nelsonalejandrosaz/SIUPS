<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class SecretariaMiddleware
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
    if(Auth::user()){
      foreach (Auth::user()->rol as $role) {
        if ($role->nombre=='secretaria'){
        return $next($request);
        }
      }
  }
        return redirect('permisoDenegado');
    }
}
