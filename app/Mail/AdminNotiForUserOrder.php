<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotiForUserOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;
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
            ->view('admin.email.order_status')
            ->subject('Su orden #'. $this->data['numero_orden'].'ha cambiado de estado')
            ->with($this->data);
    }
}
