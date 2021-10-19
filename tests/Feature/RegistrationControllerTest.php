<?php

namespace Tests\Feature;

use App\Http\Controllers\RegistrationController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    public function postProvider()
    {
        return [
            ['xcvc4@yandex.ru', '123456', '123456', true],
            ['dfd@yandex.ru', '123456', '123456', false],
            ['emasil5@yandex.ru', '1', '1', false],
            ['emaisl3s@yandex.ru', '123456', '12356', false],
        ];
    }

    public function test_get()
    {
        $response = $this->get('/registration');
        $response->assertStatus(200);

        session(['auth' => true]);
        $response = $this->get('/registration');
        $response->assertLocation('/');
    }

    /**
     * @dataProvider postProvider
     */

    public function test_post(string $email, string $password, string $confirm_password, bool $isOk)
    {
        $_SERVER['SERVER_NAME'] = 'localhost';
        $_SERVER['REMOTE_ADDR'] = '127.0.0.1';

        $response = $this->post('/registration', [
            'email' => $email,
            'password' => $password,
            'confirm_password' => $confirm_password
        ]);

        $user = User::where('email', $email)->first();

        if ($isOk) {
            $this->assertEquals($email, $user->email);
        } else {
            $this->assertFalse($user);
        }
        

        $response->assertLocation('/');
        $response->assertStatus(302);
    }
}
