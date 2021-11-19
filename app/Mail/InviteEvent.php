<?php

namespace App\Mail;

use App\Models\EventoSocio;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteEvent extends Mailable
{   use Queueable, SerializesModels;
    public $subject = 'Información de nuevo Evento';
    public $correo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correo)
    {
        $this->correo = $correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.inviteEvent');
    }
}
