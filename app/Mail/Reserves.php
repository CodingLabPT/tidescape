<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Reserves extends Mailable
{
    use Queueable, SerializesModels;

    public $tourName;
    public $email;
    public $day;
    public $time;
    public $boat;
    public $phone;
    public $locale;
    public function __construct($email, $phone, $tourName, $day, $time, $boat, $locale)
    {
        $this->email = $email;
        $this->tourName = $tourName;
        $this->day = $day;
        $this->time = $time;
        $this->boat = $boat;
        $this->phone = $phone;
        $this->locale = $locale;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail/mails.reserves_subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mails.reserves',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
