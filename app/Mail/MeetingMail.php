<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MeetingMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public $id,
        public $title,
        public $schedule,
    )
    {
        //
    }

    public function build()
    {
        return $this->subject('Virtual Meeting Mail')->view('mails.meeting', [
            'meet_id'=> $this->id,
            'meet_title'=> $this->title,
            'schedule'=> $this->schedule
        ]);
    }
}
