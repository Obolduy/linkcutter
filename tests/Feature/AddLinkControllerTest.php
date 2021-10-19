<?php

namespace Tests\Feature;

use App\Models\{FullLinks, LinksList};
use Tests\TestCase;

class AddLinkControllerTest extends TestCase
{
    public function test_post()
    {
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        $response = $this->json('POST', '/addlink', [
            "protocol"=>"https:",
            "origin"=>"https://github.com",
            "host"=>"github.com",
            "hostname"=>"github.com",
            "pathname"=>"/russsiq/laravel-docs-ru",
            "href"=>"https://github.com/russsiq/laravel-docs-ru",
            "search"=>"",
            "hash"=>""
        ]);

        $linksList = LinksList::where('url', 'https://github.com/russsiq/laravel-docs-ru')->first();
        $fullLinks = FullLinks::where('href', 'https://github.com/russsiq/laravel-docs-ru')->first();

        $this->assertNotNull($fullLinks);
        $this->assertNotNull($linksList);
    }
}
