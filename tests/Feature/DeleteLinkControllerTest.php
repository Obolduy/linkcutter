<?php

namespace Tests\Feature;

use App\Models\{LinksList, FullLinks};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DeleteLinkControllerTest extends TestCase
{
    public function getProvider()
    {
        return [
            [13, false],
            [14, true],
            [15, true]
        ];
    }

    /** 
     * @dataProvider getProvider
     */

    public function test_example(int $id, bool $isOk)
    {
        Auth::loginUsingId(1);

        $this->get("/account/delete_link/$id");
        
        if ($isOk) {
            $this->assertNull(LinksList::find($id));
            $this->assertNull(FullLinks::where('id_in_list', $id)->first());
        } else {
            $this->assertNotNull(LinksList::find($id));
            $this->assertNotNull(FullLinks::where('id_in_list', $id)->first());
        }
    }
}
