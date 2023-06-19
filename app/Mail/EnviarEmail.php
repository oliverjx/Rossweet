<?php 

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $correo;
    public $mensaje;
    public $subject;

    public function __construct($nombre, $correo, $mensaje, $subject)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->mensaje = $mensaje;
        $this->subject = $subject;

    }

    public function build()
    {
        return $this->view('emails.enviar_email')
                    ->subject($this->subject);
    }
}
