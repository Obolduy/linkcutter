<?php

namespace App\Http\Controllers;

use App\Models\{FullLinks, LinksList};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\Support\Str;

class AddLinkController extends Controller
{
    public function addLink(Request $request)
    {
        $url = json_decode($request->getContent(), true);

        if ($url['host'] === $_SERVER['SERVER_NAME']) {
            $link = LinksList::where('short_url',mb_substr($url['pathname'], 1))->first();

            if ($link) {
                echo $link['url']; die();
            }
        }

        $user_id = Auth::id() ?? null;
        
        $ip = $request->ip ?? $_SERVER['REMOTE_ADDR'];

        $user_id ? $expires_day = 30 : $expires_day = 10;
        $date = date('Y-m-d', time() + 60*60*24*$expires_day); // + 10 или 30 дней
        
        $link_hash = $this->generateLink();

        DB::beginTransaction();

        $links_list = LinksList::create([
            'url' => $url['href'],
            'short_url' => $link_hash,
            'redirect_count' => 0,
            'creator_ip' => ip2long($ip),
            'expires_at' => $date,
            'user_id' => $user_id,
            'active' => 1
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

        echo "http://{$_SERVER['SERVER_NAME']}/$link_hash";
    }

    private function generateLink(): string
    {
        $link = Str::random(6);

        if (LinksList::where('short_url', $link)->first()) {
            $this->generateLink();
        }

        return $link;
    }
}
