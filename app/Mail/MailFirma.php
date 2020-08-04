<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ProcesVerbal;

class MailFirma extends Mailable
{
    use Queueable, SerializesModels;

    private $cod;
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cod)
    {
        $this->cod = $cod;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $procese = ProcesVerbal::where('id_beneficiar', $this->cod)->get();

        return $this->markdown('email.firma')->with(['procese' => $procese]);
    }
}
