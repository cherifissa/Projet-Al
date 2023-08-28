<?php

namespace Modules\LouangeBar\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LouanBarMiddleware
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
        $userData = session('admin');
        $isadmin = $userData['isadmin'] ?? null;

        if ($isadmin === 'admin') {
            return $next($request);
        }

        return response()->view('middleware.customview', [], 200);
    }
}
