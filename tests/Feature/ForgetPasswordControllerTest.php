<?php

namespace Tests\Feature;

use App\Models\{PasswordsResets, User};
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ForgetPasswordControllerTest extends TestCase
{
    public function requestResetProvider()
    {
        return [
            ['testchng@mail2.com', true],
            ['bvnfmvi@fkmdf.ru', false],
            ['fksmfm@rem.com', false]
        ];
    }

    public function resetPasswordProvider()
    {
        return [
            ['testchng@mail2.com', 'VAnIesC7ZWSjPRrA', '111111', '111111', true],
            ['ddf@mail2.com', 'VAnIesC7ZWSjPRrA', 'password', 'confirm_password', false],
            ['testchng@mail2.com', 'VAnIesC7ZWSjPRrA', 'password', 'confirm_password', false]
        ];
    }

    /** 
     * @dataProvider requestResetProvider
     */

    public function test_requestReset(string $email, bool $isOk)
    {
        $response = $this->json('POST', '/account/forget_password/email_check', [
            'email'=>$email
        ]);

        $response->dump(); die();
        $passwordsResets = PasswordsResets::where('email', $email)->first();

        if ($isOk) {
            $this->assertEquals($email, $passwordsResets->email);
        } else {
            $this->assertNull($passwordsResets);
        }
    }

    /** 
     * @dataProvider resetPasswordProvider
     */

    public function test_resetPassword(string $email, string $hash, string $password, string $confirm_password, bool $isOk)
    {
        $response = $this->post("/account/forget_password/reset_password/$hash", [
            'password'=>$password,
            'confirm_password'=>$confirm_password
        ]);

        $passwordsResets = PasswordsResets::where('hash', $hash)->first();
        $user = User::where('email', $email)->first();
        
        if ($isOk) {
            $this->assertTrue(Hash::check($password, $user->password));
            $this->assertNull($passwordsResets);
        } else {
            $response->assertLocation('/');
        }
    }
}
