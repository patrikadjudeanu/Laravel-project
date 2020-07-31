<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailProces extends Mailable
{
    use Queueable, SerializesModels;

    private $cod;
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cod, $data)
    {
        $this->cod = $cod;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.proces')->with(
                                                    ['cod' => $this->cod,
                                                     'data' => $this->data
                                                    ]);
    }
}
