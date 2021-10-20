<?php

namespace Tests\Feature;

use App\Models\LinksList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpdateLinkControllerTest extends TestCase
{
    public function getProvider()
    {
        return [
            [5, '2021-11-20', false],
            [10, '2021-11-19', true],
            [11, '2021-11-20', false]
        ];
    }

    /** 
     * @dataProvider getProvider
     */

    public function test_example(int $id, string $date, bool $isOk)
    {
        $linksList = LinksList::find($id);

        if ($isOk) {
            Auth::loginUsingId(1);

            $response = $this->get("/account/update_link/$id");
            $this->assertEquals($date, $linksList->expires_at);
        } else {
            $this->assertNotEquals($date, $linksList->expires_at);
        }
    }
}
