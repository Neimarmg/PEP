<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
// use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    // public function handle($request, Closure $next, $guard = null)
    public function handle($request, Closure $next)
    {
        foreach (Auth::user()->role as $key => $role) {
            if($role->name == 'admin'){
                return $next($request);
            }
        }
        return redirect('/');
    }
}
