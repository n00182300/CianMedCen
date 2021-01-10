<?php
# @Date:   2020-11-14T17:51:58+00:00
# @Last modified time: 2020-11-14T18:24:22+00:00




namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$role)
    {
        if(!$request->user() || !$request->user()->authorizeRoles($role)){
          return redirect()->route('home');
        }

        return $next($request);
    }
}
