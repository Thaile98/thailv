<?php

namespace App\Http\Middleware;

use Closure;

class CheckBrowser
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
        $browserAgent = $_SERVER['HTTP_USER_AGENT'];
        if(!strpos($browserAgent,'Chrome'))
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
