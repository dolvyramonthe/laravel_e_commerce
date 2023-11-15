<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // RedirectIfNotUser.php
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role !== 'user') {
            return redirect('/'); // Redirect unauthorized users to the homepage or login page
        }

        return $next($request);
    }

}
