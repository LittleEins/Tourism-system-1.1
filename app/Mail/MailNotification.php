<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotification extends Mailable
{
    use Queueable, SerializesModels;
    // variable where we can pass data here 
    public $email_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //  the variable tha come from controller
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // This is all the data we sent to email
        return $this->from(env('MAIL_USERNAME'))->subject("Tourism Email Verification")->view('mail.mail-notification', ['acc_data' => $this->email_data]);
    
    }
}
