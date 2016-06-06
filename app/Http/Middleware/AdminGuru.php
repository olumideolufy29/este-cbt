<?php

namespace Eoola\Http\Middleware;

use Closure;

class AdminGuru
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
        if (auth()->check() && (auth()->user()->role == "admin" || auth()->user()->role == "teacher")) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
