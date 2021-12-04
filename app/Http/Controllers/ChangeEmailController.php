<?php

namespace App\Http\Controllers;

use App\Mail\EmailChange;
use Illuminate\Http\Request;
use App\Models\{EmailsChanges, User};
use Illuminate\Support\Facades\{Auth, DB, Hash, Mail};
use Illuminate\Support\Str;

class ChangeEmailController extends Controller
{
    public function changeEmailRequest(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('changeemailform');
        }

        if (Hash::check(strip_tags($request->password), Auth::user()->password)) {
            $request->validate([
                'email' => 'max:64|unique:users'
            ]);
    
            $hash = Str::random();
            
            $emailsChanges = new EmailsChanges;
            $emailsChanges->user_id = Auth::id();
            $emailsChanges->hash = $hash;
            $emailsChanges->new_email = strip_tags($request->email);
            $emailsChanges->requested_at = DB::raw('now()');
            $emailsChanges->save();
    
            Mail::to(Auth::user()->email)->send(new EmailChange($hash));

            return redirect('/');
        }

        return redirect()->intended();
    }

    public function changeEmailComplete(string $hash)
    {
        $user = User::find(Auth::id());
        $emailsChanges = EmailsChanges::where('user_id', Auth::id())->first();

        if ($emailsChanges->hash === $hash) {
            $user->email = $emailsChanges->new_email;
            $user->save();
            
            $emailsChanges->delete();

            return view('emailchangesuccess');
        }

        return redirect('/');
    }
}
