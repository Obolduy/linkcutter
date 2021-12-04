<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\{PasswordsChanges, User};
use Illuminate\Support\Facades\Auth;

class ChangePasswordControllerTest extends TestCase
{
    public function postProvider()
    {
        return [
            [14, '123456', '111111', '111111', true],
            [1, '1', '111111', '123456', false],
            [2, '434324243242', '123456', '123456', false],
        ];
    }

    public function getProvider()
    {
        return [
            [14, 'RPp20EkZ7IT9d8tc', '123456', true],
            [1, 'RPp20EkZ7IT9d8tc', '134565', false],
            [2, 'RPp20EkZ7IT9d8tc', '123456d', false]
        ];
    }

    /** 
     * @dataProvider postProvider
     */

    public function test_changePassword(int $user_id, string $old_password, string $new_password, string $confirm_password, bool $isOk)
    {
        $_SERVER['SERVER_NAME'] = 'localhost';
        Auth::loginUsingId($user_id);

        $response = $this->post("/account/change_password/", [
            'password' => $old_password,
            'new_password' => $new_password,
            'confirm_password' => $confirm_password
        ]);

        if ($isOk) {
            $this->assertNotNull(PasswordsChanges::where('user_id', $user_id)->first());
        } else {
            $this->assertNull(PasswordsChanges::where('new_password', $new_password)->first());
        }
    }

    /** 
     * @dataProvider getProvider
     */

    public function test_changePasswordComplete(int $user_id, string $hash, string $new_password, bool $isOk)
    {
        Auth::loginUsingId($user_id);

        $response = $this->get("/account/change_password/$hash");

        if ($isOk) {
            $this->assertNull(PasswordsChanges::where('new_password', $new_password)->first());
            
            $user = User::find($user_id);
            $this->assertEquals($new_password, $user->password);
        } else {
            $user = User::find($user_id);
            $this->assertNotEquals($new_password, $user->password);
        }

        $response->assertStatus(302);
    }
}
