<?php

namespace App\Http\Controllers;

use App\Models\LinksList;

class LinkController extends Controller
{
    public function linkmanager(string $link)
    {
        $dbLink = LinksList::select('short_url', 'url', 'active')->where('short_url', $link)->first();

        if ($dbLink || $dbLink->active == 1) {
            return redirect($dbLink->url);
        }

        return redirect('/');
    }
}
