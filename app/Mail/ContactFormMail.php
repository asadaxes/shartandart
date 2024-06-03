<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_from;
    public $mail_subject;
    public $mail_body;

    public function __construct($mail_from, $mail_subject, $mail_body)
    {
        $this->mail_from = $mail_from;
        $this->mail_subject = $mail_subject;
        $this->mail_body = $mail_body;
    }

    public function build()
    {
        return $this->subject("A new contact submission recevied.")->view('emails.contact_form', [
            'mail_from' => $this->mail_from,
            'mail_subject' => $this->mail_subject,
            'mail_body' => $this->mail_body
        ]);
    }
}