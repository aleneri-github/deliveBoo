<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Order;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $cart)
    {
      $this->order = $order;
      $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.ordermail');
    }
}
