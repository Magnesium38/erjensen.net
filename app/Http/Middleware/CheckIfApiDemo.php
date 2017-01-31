<?php namespace App\Http\Middleware;

use Closure;

class CheckIfApiDemo {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $request->attributes->add(['isDemo' => ($request->header('ClientID') == 'ApiDemoClient')]);

        return $next($request);
    }
}
