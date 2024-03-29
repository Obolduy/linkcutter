<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RememberToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('auth')) {
            if (isset($_COOKIE['remember_token'])) {
                $user = User::where('remember_token', $_COOKIE['remember_token'])->first();

                if (Auth::loginUsingId($user->id)) {
                    session()->regenerate();

                    session(['auth' => 1]);
                }
            }
        }

        return $next($request);
    }
}
