<?php

namespace App\Http\Controllers;

use App\Models\{User, PasswordsResets};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Hash, Mail};
use Illuminate\Support\Str;
use App\Mail\ResetPassword;

class ForgetPasswordController extends Controller
{
    public function requestReset(string $email)
    {
        $hash = Str::random();

        $passwordReset = new PasswordsResets();
        $passwordReset->email = $email;
        $passwordReset->hash = $hash;
        $passwordReset->requested_at = DB::raw("now()");
        $passwordReset->save();

        Mail::to($email)->send(new ResetPassword($hash));
    }

    public function resetPassword(Request $request, string $hash)
    {
        $passwordsResets = PasswordsResets::where('hash', $hash)->first();

        if (!$passwordsResets->hash) {
            return redirect('/');
        }

        if ($request->isMethod('GET')) {
            return view('newpasswordform');
        }

        $request->validate([
            'password' => 'alpha_dash',
            'confirm_password' => 'same:password'
        ]);
        
        $user = User::where('email', $passwordsResets->email)->first();

        $user->password = Hash::make(strip_tags($request->password));
        $user->save();
        $passwordsResets->delete();

        return redirect('/login');
    }

    public function checkEmail(Request $request)
    {
        $email = strip_tags($request->getContent());

        $emailCheck = User::select('email')->where('email', $email)->first();

        if (!$emailCheck) {
            echo json_encode(['error' => 'Такого email нет, проверьте правильность ввода'],
                JSON_UNESCAPED_UNICODE);
        } else {
            $this->requestReset($email);

            echo json_encode(['success' => 'success'], JSON_UNESCAPED_UNICODE);
        }
    }
}