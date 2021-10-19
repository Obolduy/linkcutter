<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ShowUserLinksControllerTest extends TestCase
{
    public function getProvider()
    {
        return [
            [1],
            [1000]
        ];
    }

    /**
     * @dataProvider getProvider
     */

    public function test_get(int $id)
    {
        Auth::loginUsingId($id);

        $response = $this->get('/account');
        if ($id === 1) {
            $response->assertStatus(200);
        } else {
            $response->assertStatus(302);
        }
    }
}
