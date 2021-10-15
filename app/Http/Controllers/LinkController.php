<?php

namespace App\Http\Controllers;

use App\Models\LinksList;

class LinkController extends Controller
{
    public function linkmanager(string $link)
    {
        $dbLink = LinksList::select('short_url', 'url')->where('short_url', $link)->first();

        if ($dbLink) {
            return redirect($dbLink->url);
        }

        return redirect('/');
    }
}
