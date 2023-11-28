<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // if (auth()->check() && auth()->user()->hasRole("admin")) {
        //     return $next($request);
        // }
        if (auth()->check() && auth()->user()->hasrole("admin")) {
            return $next($request);
        }

        // abort(403, 'Unauthorized action.');
    }
}
