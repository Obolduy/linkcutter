<?php

namespace App\Http\Controllers;

use App\Models\LinksList;
use Illuminate\Support\Facades\Auth;

class UpdateLinkController extends Controller
{
    public function updateLink(int $link_id)
    {
        $link = LinksList::find($link_id);
        
        if ($link->user_id == Auth::id()) {
            $link->active = 1;
            $link->expires_at = date('Y-m-d', time() + 60*60*24*30); // + 30 дней
            $link->save();
        }
        
        return back();
    }
}
