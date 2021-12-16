<?php

namespace App\Http\Middleware;

use Closure;

class ReirectIfnotClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="client")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('client.login'));
        }
        return $next($request);
    }
}
