<?php

namespace Eoola\Http\Middleware;

use Closure;
use Auth;

class FirstLogin
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
        if (Auth::check() && Auth::user()->first == "yes") {
            return $next($request);
        } else {
            Auth::logout();
            return redirect('/');
        }
    }
}
