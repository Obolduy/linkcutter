<?php

namespace App\Http\Controllers;

use App\Models\LinksList;

class LinkController extends Controller
{
    public function linkmanager(string $link)
    {
        $dbLink = LinksList::where('short_url', $link)->first();

        if ($dbLink && $dbLink->active == 1) {
            $dbLink->redirect_count++;
            $dbLink->save();

            return redirect($dbLink->url);
        }

        return redirect('/');
    }
}
