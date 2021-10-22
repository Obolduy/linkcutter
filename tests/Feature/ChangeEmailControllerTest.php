<?php

namespace Tests\Feature;

use App\Models\{EmailsChanges, User};
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ChangeEmailControllerTest extends TestCase
{
    public function getProvider()
    {
        return [
            [14, 'd1nrDIcW8Ct4EVNC', 'testchng@mail1.com', true],
            [1, 'S7FLhTQMXbvDVJ9p', 'testchng@mail2.com', true],
            [2, 'S7FLhTQMXbvDVJ9p', 'testchng@mail2.com', false]
        ];
    }

    public function postProvider()
    {
        return [
            [14, 'testchng@mail1.com', '111111', true],
            [1, 'testchng@mail2.com', '1', true],
            [1, 'emaxzcil1@yandex.ru', '123456', false]
        ];
    }

    /** 
     * @dataProvider postProvider
     */

    public function test_changeEmailRequest(int $user_id, string $email, string $password, bool $isOk)
    {
        $_SERVER['SERVER_NAME'] = 'localhost';
        Auth::loginUsingId($user_id);

        $response = $this->post("/account/change_email/", [
            'email' => $email,
            'password' => $password
        ]);

        if ($isOk) {
            $this->assertNotNull(EmailsChanges::where('user_id', $user_id)->first());
        } else {
            $this->assertNull(EmailsChanges::where('new_email', $email)->first());
        }

        $response->assertStatus(302);
    }

    /** 
     * @dataProvider getProvider
     */

    public function test_changeEmailComplete(int $user_id, string $hash, string $new_email, bool $isOk)
    {
        Auth::loginUsingId($user_id);

        $response = $this->get("/account/change_email/$hash");

        if ($isOk) {
            $this->assertNull(EmailsChanges::where('new_email', $new_email)->first());

            $response->assertStatus(200);

            $user = User::find($user_id);
            $this->assertEquals($new_email, $user->email);
        } else {
            $user = User::find($user_id);
            $this->assertNotEquals($new_email, $user->email);

            $response->assertStatus(302);
        }
    }
}
