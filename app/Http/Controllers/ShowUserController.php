<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowUserController extends Controller
{
    public function showUser()
    {
        $user = Auth::user();
        return view('showuser', ['user' => $user]);
    }
}
