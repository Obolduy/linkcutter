<?php

namespace Tests\Feature;

use App\Models\EmailsVerifications;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UpdateMailControllerTest extends TestCase
{
    public function getProvider()
    {
        return [
            [1, 'AVosM1SKf7BsU783', false],
            [13, 'AVosM1SKf7BsU783', true],
            [14, 'FvJHdugYAHbIAS3Y', true]
        ];
    }

    /** 
     * @dataProvider getProvider
     */

    public function test_example(int $user_id, string $hash, bool $isOk)
    {
        Auth::loginUsingId($user_id);

        $response = $this->get("/account/update_email/$hash");

        if ($isOk) {
            $this->assertNull(EmailsVerifications::where('hash', $hash)->first());
            $response->assertStatus(302);
        } else {
            $response->assertStatus(200);
        }
    }
}
