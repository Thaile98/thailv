<?php

namespace Modules\Admin\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if(Auth::guard('admins')->check())
        {
            return redirect()->route('get.dashboard');
        }
        return $next($request);
    }
}
