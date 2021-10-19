<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsntAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (session('auth')) {
            return redirect()->intended();
        }

        return $next($request);
    }
}
