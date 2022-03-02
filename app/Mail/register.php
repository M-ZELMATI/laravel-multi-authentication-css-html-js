<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class register extends Mailable
{
    public $details;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($maildetails)
    {
        //
        $this->details=$maildetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
           return $this->subject('Verification e-mail accont My APP')->view('Mail.register');
       
        
    }
}
