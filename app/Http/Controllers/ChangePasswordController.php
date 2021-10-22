<?php

namespace App\Http\Controllers;

use App\Mail\PasswordChange;
use Illuminate\Http\Request;
use App\Models\{PasswordsChanges, User};
use Illuminate\Support\Facades\{Auth, DB, Hash, Mail};
use Illuminate\Support\Str;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('changepasswordform');
        }

        if (Hash::check(strip_tags($request->password), Auth::user()->password)) {
            $request->validate([
                'new_password' => 'alpha_dash',
                'confirm_password' => 'same:new_password'
            ]);
    
            $hash = Str::random();
            
            $passwordsChanges = new PasswordsChanges;
            $passwordsChanges->user_id = Auth::id();
            $passwordsChanges->hash = $hash;
            $passwordsChanges->new_password = Hash::make(strip_tags($request->new_password));
            $passwordsChanges->requested_at = DB::raw('now()');
            $passwordsChanges->save();
    
            Mail::to(Auth::user()->email)->send(new PasswordChange($hash));

            return redirect('/');
        }

        return redirect()->intended();
    }

    public function changePasswordComplete(string $hash)
    {
        $user = User::find(Auth::id());
        $passwordsChanges = PasswordsChanges::where('hash', $hash)->first();

        if ($passwordsChanges) {
            $user->password = $passwordsChanges->new_password;
            $user->save();
            
            $passwordsChanges->delete();

            return view('passwordchangesuccess');
        }

        return redirect('/');
    }
}
