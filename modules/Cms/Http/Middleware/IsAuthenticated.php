<?php

namespace Cms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAuthenticated
{
    /**
     * Check if user is authenticated or else display login screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(route('login') . '?ref=profile');
        }

        return $next($request);
    }
}
