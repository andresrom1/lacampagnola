<?php

namespace App\Http\Middleware;

use Closure;

class CustomHeaders
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
        $response = $next($request);

        $response->header('Cache-Control', 'no-cache, must-revalidate, no-store');
        $response->header('Pragma', 'no-cache');

        return $response;
    }
}
