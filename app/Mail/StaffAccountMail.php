<?php

namespace App\Mail; 

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StaffAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $cell;
    public $photo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this -> name = $data['name'];
        $this -> email = $data['email'];
        $this -> cell = $data['cell'];
        $this -> photo = $data['photo'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.staff');
    }
}
