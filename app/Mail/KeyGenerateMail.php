<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KeyGenerateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public string $subject_mail,
        public string $key
    )
    {
        //
    }

    public function build()
    {
        return $this->subject($this->mail_subject)->view('mails.generateKey', [
            'subject_mail'=> $this->subject_mail,
            'key'=> $this->phone_no

        ]);
    }
}
