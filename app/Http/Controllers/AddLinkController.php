<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddLinkController extends Controller
{
    public function addLink(Request $request)
    {
        $url = json_decode($request->getContent(), true);

        
    }
}
