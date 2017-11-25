<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
// use Illuminate\Support\Facades\Auth;

class AlunoMiddleware
{
    // public function handle($request, Closure $next, $guard = null)
    public function handle($request, Closure $next)
    {
        foreach (Auth::user()->role as $key => $role) {
            if($role->name == 'aluno'){
                return $next($request);
            }
        }
        return redirect('/');
    }
}
