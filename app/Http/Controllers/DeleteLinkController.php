<?php

namespace App\Http\Controllers;

use App\Models\{FullLinks, LinksList};
use Illuminate\Http\Request;

class DeleteLinkController extends Controller
{
    public static function deleteLink(Request $request, int $link_id)
    {
        $link = LinksList::find($link_id);
        $fullLink = FullLinks::select('*')->where('id_in_list', $link_id)->first();

        if ($link->user_id === $request->user()->id) {
            $link->delete();
            $fullLink->delete();

            if ($request->isMethod('DELETE')) {
                return ["Success" => "The link has been deleted"];
            }
        }

        return redirect()->intended();
    }
}