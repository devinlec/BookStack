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
        preg_match("/Windows NT ([0-9]+)/", $request->userAgent(), $matches);
        if(count($matches) == 2 && $matches[1] <= 5) {
            config()->set('app.dist_suffix', '_xp');
        }

        return $next($request);
    }
}
