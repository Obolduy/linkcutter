<?php

namespace App\Http\Controllers;

use App\Models\{FullLinks, LinksList};

class DeleteLinkController extends Controller
{
    public static function deleteLink(int $link_id)
    {
        $link = LinksList::find($link_id);
        $fullLink = FullLinks::select('*')->where('id_in_list', $link_id)->first();

        $link->delete();
        $fullLink->delete();

        if ($_SERVER['REQUEST_METHOD']) {
            return redirect()->intended();
        }
    }
}