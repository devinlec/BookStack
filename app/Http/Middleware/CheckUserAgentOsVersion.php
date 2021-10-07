<?php

namespace BookStack\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserAgentOsVersion
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(stripos($request->userAgent(), "Windows NT 5.1") !== false) {
            config()->set('app.dist_suffix', '_xp');
        }

        return $next($request);
    }
}
