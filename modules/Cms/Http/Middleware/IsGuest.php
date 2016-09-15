<?php

namespace Cms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsGuest
{
    /**
     * Check if user is guest or else redirect to a homepage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
