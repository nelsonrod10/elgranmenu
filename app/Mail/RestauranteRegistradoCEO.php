<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RestauranteRegistradoCEO extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $datos;
    
    public function __construct($datos)
    {
        $this->datos = $datos;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lanzamiento@elgranmenu.com')
                ->name('Lanzamiento ElGranMenu')
                ->subject("ElGranMenu, tenemos un nuevo inscrito!!")
                ->markdown('emails.registro.ceo');
    }
}
