<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TimezoneManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('timezoned')) {
            App::setTimezone(session()->get('timezoned'));
        }

        return $next($request);
    }
}
