<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class CheckPermission
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
        $permission=Route::currentRouteName();
        $user=$request->user();
       if(!$user->can($permission)){
           abort(403, 'Unauthorized permission.');
       }
        return $next($request);
    }
}
