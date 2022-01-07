<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiTokenController extends Controller
{
    public function apiGenerateToken(Request $request)
    {
        $email = htmlspecialchars(strip_tags(trim($request->email)));
        $password = htmlspecialchars(strip_tags(trim($request->password)));
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $token = $request->user()->createToken('testtokenname');
    
            return ['token' => $token->plainTextToken];
        } else {
            return ["error" => "Wrong data"];
        }
    }
}
