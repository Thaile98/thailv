<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissions)
    {
        if (!is_array($permissions)) 
        {
            $permissions = explode('|', $permissions);
        }

        if(!admin_can($permissions))
        {
            abort(403);
        }
        
        return $next($request);
    }
}
