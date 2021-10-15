<?php

namespace App\Http\Controllers;

use App\Models\LinksList;
use App\Models\FullLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};

class AddLinkController extends Controller
{
    public function addLink(Request $request)
    {
        $url = json_decode($request->getContent(), true);

        $user_id = Auth::id() ?? null;
        
        $ip = $request->ip ?? $_SERVER['REMOTE_ADDR'];

        $user_id ? $expires_day = 30 : $expires_day = 10;
        $date = date('Y-m-d', time() + 60*60*24*$expires_day); // + 10 или 30 дней

        DB::beginTransaction();

        $links_list = LinksList::create([
            'url' => $url['href'],
            'redirect_count' => 0,
            'creator_ip' => ip2long($ip),
            'expires_at' => $date,
            'user_id' => $user_id
        ]);

        FullLinks::create([
            'id_in_list' => $links_list->id,
            'href' => $url['href'],
            'protocol' => $url['protocol'],
            'origin' => $url['origin'],
            'host' => $url['host'],
            'hostname' => $url['hostname'],
            'pathname' => $url['pathname'],
            'search' => $url['search'],
            'hash' => $url['hash']
        ]);
        
        DB::commit();
    }
}
