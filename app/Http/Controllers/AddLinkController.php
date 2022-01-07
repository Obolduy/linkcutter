<?php

namespace App\Http\Controllers;

use App\Models\{FullLinks, LinksList};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use Illuminate\Support\Str;

class AddLinkController extends Controller
{
    public function addLink(Request $request)
    {
        $url = json_decode($request->getContent(), true);

        if ($url['host'] === $_SERVER['SERVER_NAME']) {
            $link = LinksList::where('short_url', mb_substr($url['pathname'], 1))->first();

            if ($link) {
                echo $link['url']; die();
            }
        }

        $user_id = Auth::id() ?? null;

        $link_hash = $this->addLinkToDB($request->ip, $user_id, $url);

        echo "http://{$_SERVER['SERVER_NAME']}/$link_hash";
    }

    public function apiAddLink(Request $request)
    {
        try {
            $url = parse_url(strip_tags($request->getContent()));

            $url['protocol'] = $url['scheme'];
            $url['pathname'] = $url['path'];
            $url['search'] = $url['query'] ?? null;
            $url['hash'] = $url['fragment'] ?? null;
            $url['hostname'] = $url['host'];
            $url['origin'] = "{$url['scheme']}://{$url['hostname']}";
            $url['href'] = strip_tags($request->getContent());
    
            unset($url['scheme'], $url['path'], $url['query'], $url['fragment']);
    
            $link_hash = $this->addLinkToDB($request->user()->ip, $request->user()->id, $url);
        } catch (Exception $e) {
            return response(["error" => "Check link"], 400);
        }
        
        return ["link" => "http://{$_SERVER['SERVER_NAME']}/$link_hash"];
    }

    private function addLinkToDB(?int $ip, ?int $user_id, array $url): string
    {
        $ip = $ip ?? $_SERVER['REMOTE_ADDR'];

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

        return $link_hash;
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
