<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailAgainConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $hash;

    public function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public function build()
    {
        return $this->from('testsender@mail.com', 'testname')->view('emailverifyagain')->with([
            'hash' => $this->hash
        ]);
    }
}
