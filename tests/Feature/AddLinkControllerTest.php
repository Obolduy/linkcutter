<?php

namespace Tests\Feature;

use App\Models\{FullLinks, LinksList};
use Tests\TestCase;

class AddLinkControllerTest extends TestCase
{
    public function addLinkProvider()
    {
        return [
            [
                "protocol"=>"https:",
                "origin"=>"https://github.com",
                "host"=>"github.com",
                "hostname"=>"github.com",
                "pathname"=>"/russsiq/laravel-docs-ru",
                "href"=>"https://github.com/russsiq/laravel-docs-ru",
                "search"=>"",
                "hash"=>""
            ],
            [
                "protocol"=>"https:",
                "origin"=>"https://youtube.com",
                "host"=>"youtube.com",
                "hostname"=>"youtube.com",
                "pathname"=>"/",
                "href"=>"https://youtube.com/",
                "search"=>"",
                "hash"=>""
            ]
        ];
    }

    /** 
     * @dataProvider addLinkProvider
     */

    public function test_addLink(array $url)
    {
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        $response = $this->json('POST', '/addlink', [
            "protocol"=>$url['protocol'],
            "origin"=>$url['origin'],
            "host"=>$url['host'],
            "hostname"=>$url['hostname'],
            "pathname"=>$url['pathname'],
            "href"=>$url['href'],
            "search"=>$url['search'],
            "hash"=>$url['hash']
        ]);

        $linksList = LinksList::where('url', $url['href'])->first();
        $fullLinks = FullLinks::where('href', $url['href'])->first();

        $this->assertNotNull($fullLinks);
        $this->assertNotNull($linksList);
    }
}
