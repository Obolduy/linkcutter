<?php

namespace Tests\Feature;

use App\Models\LinksList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
    public function getProvider()
    {
        return [
            ['mm5MkB', 'https://www.sports.ru/', 2, true],
            ['Z4majM', 'https://vk.com/im', 1, true],
            ['9qjL7z', 'http://yandex.ru', 0, false]
        ];
    }

    /** 
     * @dataProvider getProvider
     */

    public function test_example(string $shortUrl, string $url, int $redirectCount, bool $isOk)
    {
        $response = $this->get("/$shortUrl");

        $linksList = LinksList::where('short_url', $shortUrl)->first();

        if ($isOk) {
            $response->assertStatus(302);
            $response->assertLocation($url);

            $this->assertEquals($url, $linksList->url);
            $this->assertEquals($redirectCount, $linksList->redirect_count);
        } else {
            $this->assertNull($linksList);
        }
    }
}
