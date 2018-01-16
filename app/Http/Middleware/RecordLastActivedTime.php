<?php

namespace App\Http\Middleware;

use Auth;

use Closure;
use function GuzzleHttp\Psr7\uri_for;

class RecordLastActivedTime
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
        if (Auth::check()){
            Auth::user()->recordLastActivedAt();
        }
        return $next($request);
    }
}
