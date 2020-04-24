<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\VieW;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role_id)
    {
        $user = Auth::user();
        if($user->role_id == $role_id){
            return $next($request);
        }else{
        return response()->view('errors.503', [], 503);
    }


    }
}
