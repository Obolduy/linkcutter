<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB, Hash};
use Illuminate\Auth\Events\Registered;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('registration');
        }

        $request->validate([
            'email' => 'max:64|unique:users',
            'password' => 'alpha_dash|different:email',
            'confirm_password' => 'same:password'
        ]);

        $ip = $request->ip ?? $_SERVER['REMOTE_ADDR'];

        $user = new User;

        $user->email = htmlspecialchars(strip_tags(trim($request->email)));
        $user->password = Hash::make(htmlspecialchars(strip_tags(trim($request->password))));
        $user->ip = DB::raw("INET_ATON('$ip')");

        $user->save();

        if (Auth::attempt(['email' => $user->email, 'password' => htmlspecialchars(strip_tags(trim($request->password)))])) {
            $request->session()->regenerate();
            $request->session()->put(['auth' => true]);
        }

        event(new Registered($user));
        return redirect('/');
    }
}
