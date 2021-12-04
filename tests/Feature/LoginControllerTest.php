<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    public function postProvider()
    {
        return [
            ['xcvc4@yandex.ru', '123456', true],
            ['testmail@rambler.ru', '1234323', false],
            ['testmail@rambler.ru', '12', false]
        ];
    }

    public function test_get()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);

        session(['auth' => true]);
        $response = $this->get('/login');
        $response->assertLocation('/');
    }

    /**
     * @dataProvider postProvider
     */

    public function test_post(string $email, string $password, bool $isOk)
    {
        $response = $this->post('/login', [
            'email' => $email,
            'password' => $password
        ]);

        if ($isOk) {
            $this->assertEquals($email, Auth::user()->email);
        } else {
            $this->assertNull(Auth::user());
        }
        
        $response->assertLocation('/');
        $response->assertStatus(302);
    }
}
