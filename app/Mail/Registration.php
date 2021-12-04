<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registration extends Mailable
{
    use Queueable, SerializesModels;

    protected $hash;

    public function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    public function build()
    {
        return $this->from('testsender@mail.com', 'testname')->view('emailregistration')->with([
            'hash' => $this->hash
        ]);
    }
}
