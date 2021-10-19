<?php

namespace App\Http\Controllers;

use App\Mail\Registration;
use App\Models\{EmailsVerifications, User};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{Auth, DB, Hash, Mail};

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

        $hash = Str::random();

        $emailsVerifications = new EmailsVerifications;
        $emailsVerifications->email = $user->email;
        $emailsVerifications->hash = $hash;
        $emailsVerifications->user_id = $user->id;
        $emailsVerifications->save();

        Mail::to($user->email)->send(new Registration($hash));

        return redirect('/');
    }

    public function verifyEmail(string $hash)
    {
        $user = User::find(Auth::id());
        $emailsVerifications = EmailsVerifications::where('hash', $hash)->first();

        if ($user->id == $emailsVerifications->user_id) {
            $user->email_verified_at = now();
            $user->save();

            $emailsVerifications->delete();

            return redirect('/');
        }
    }
}
