<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('login');
        }

        if (Auth::attempt(['email' => htmlspecialchars(strip_tags(trim($request->email))), 'password' => htmlspecialchars(strip_tags(trim($request->password)))])) {
            $request->session()->regenerate();
            $request->session()->put(['auth' => true]);

            if ($request->remember_token) {
                $remember_token = Hash::make(time() + Auth::id());

                $user = User::where('id', Auth::id())->first();
                $user->remember_token = $remember_token;
                $user->save();

                setcookie('remember_token', $remember_token, time() + 3600*24*30*365);
            }

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Email неправильный',
            'password' => 'Пароль неправильный'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        setcookie('remember_token', '', time());

        return redirect('/');
    }
}