<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactReplyMail extends Mailable
{
    public $subjectText;
    public $messageText;

    public function __construct($subjectText, $messageText)
    {
        $this->subjectText = $subjectText;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this
            ->subject($this->subjectText)
            ->view('emails.reply');
    }
}