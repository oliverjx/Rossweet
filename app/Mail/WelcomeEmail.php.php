<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @param  array  $details
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('¡Bienvenido a nuestra aplicación!')
            ->view('emails.welcome')
            ->with('details', $this->details);
    }

    public static function sendEmail()
    {
        $details = [
            'title' => 'Correo de prueba',
            'body' => 'Este es un correo de prueba enviado desde Laravel.'
        ];

        Mail::to('recipient@example.com')->send(new WelcomeEmail($details));

        return "Correo electrónico enviado.";
    }
}
