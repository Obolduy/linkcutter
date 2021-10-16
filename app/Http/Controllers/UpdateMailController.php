<?php

namespace App\Http\Controllers;

use App\Models\{User, EmailsVerifications};
use Illuminate\Support\Facades\Auth;

class UpdateMailController extends Controller
{
    public function updateMailDate(string $hash)
    {
        $user = User::find(Auth::id());
        $emailsVerifications = EmailsVerifications::select('*')->where('hash', $hash)->first();

        if ($user->id == $emailsVerifications->user_id) {
            $user->updated_at = now();
            $user->save();

            $emailsVerifications->delete();

            return redirect('/');
        }
    }
}
