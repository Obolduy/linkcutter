<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChange extends Mailable
{
    use Queueable, SerializesModels;

    protected $hash;

    public function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public function build()
    {
        return $this->from('testsender@mail.com', 'testname')->view('emailpasswordchange')->with([
            'hash' => $this->hash
        ]);
    }
}
