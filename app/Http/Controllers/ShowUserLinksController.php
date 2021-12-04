<?php

namespace App\Http\Controllers;

use App\Models\LinksList;
use Illuminate\Support\Facades\Auth;

class ShowUserLinksController extends Controller
{
    public function showLinks()
    {
        $links = LinksList::where('user_id', Auth::id())->get();

        return view('showuserlinks', ['links' => $links]);
    }
}