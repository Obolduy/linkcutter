<?php

namespace App\Http\Controllers;

use App\Models\LinksList;

class UpdateLinkController extends Controller
{
    public function updateLink(int $link_id)
    {
        $link = LinksList::find($link_id);
        $link->active = 1;
        $link->expires_at = date('Y-m-d', time() + 60*60*24*30);
        $link->save();
        
        return back();
    }
}
