<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSedDetail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data    = $data;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        $email = env('MAIL_FROM_ADDRESS');
        $name = env('APP_NAME');

        return $this->from($email, $name)
                    ->view('notificaciones.mensaje1')
                    ->subject('Detalle desu compra', $name)
                    ->with($this->data);
    }
}
