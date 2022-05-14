<?php

namespace App\Http\Middleware;

use App\Exceptions\MethodNotAllowedException;
use App\Models\Role;
use Closure;


class RoleAdmin
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
//        $method = $request->method();
//        $requestUri = $request->getRequestUri();

//        dd(__METHOD__, $request->user());

        if ( !in_array($request->user()->role_id, [Role::ROLE_ADMIN]) ) {
            throw new MethodNotAllowedException;
        }

        return $next($request);
    }
}
