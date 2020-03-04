<?php

namespace App\Http\Middleware;

use Closure;

class DashboardAccess
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
        if (auth()->user()->hasRole('User')) {
            abort('404');
        }
        return $next($request);
    }
}
