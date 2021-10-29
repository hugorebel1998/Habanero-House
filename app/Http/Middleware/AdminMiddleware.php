<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (auth()->check() && auth()->user()->permiso == 1) {
            return $next($request);
        } elseif (auth()->check() && auth()->user()->permiso == 2) {
            return $next($request);
        } elseif (auth()->check() && auth()->user()->permiso == 3) {
            return $next($request);
        } elseif(auth()->check() && auth()->user()->permiso == null) {
            return redirect('/home');
        }
    }
}
