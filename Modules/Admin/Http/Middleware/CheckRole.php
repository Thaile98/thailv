<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!is_array($roles)) 
        {
            $roles = explode('|', $roles);
        }

        if(!admin_hasRole($roles))
        {
            abort(403);
        }
        
        return $next($request);
    }
}
