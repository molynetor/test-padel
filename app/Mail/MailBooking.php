<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function build()
    {
        $order = $this->data;
      
        return $this->from('support@yosoytupadel.com')->view('mail.mail_booking',compact('order'))->subject('Email de Yo soy tu Padel');
    }
}
