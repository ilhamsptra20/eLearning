<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "lecturer" && Auth::guard($guard)->check()) {
            return redirect(route('lecturer'));
        }
        if ($guard == "student" && Auth::guard($guard)->check()) {
            return redirect(route('student'));
        }
        if (Auth::guard($guard)->check()) {
            return redirect(route('admin'));
        }

        return $next($request);
    }
}
