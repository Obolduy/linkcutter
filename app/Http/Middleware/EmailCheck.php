<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (session('auth')) {
            if (date('Y-m-d', strtotime(Auth::user()->updated_at . "+20 days")) < date('Y-m-d', time())) {
                return view('requestconfirmemail');
            }
        }

        return $next($request);
    }
}
