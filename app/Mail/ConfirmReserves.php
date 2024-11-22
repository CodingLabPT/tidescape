<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmReserves extends Mailable
{
    use Queueable, SerializesModels;
    
    public $locale;
    public $email;
    public $tourName;
    public $day;
    public $time;
    public $boat;
    public $phone;
    
    public function __construct($locale, $email, $phone, $tourName, $day, $time, $boat)
    {
        $this->locale = $locale;
        $this->email = $email;
        $this->tourName = $tourName;
        $this->day = $day;
        $this->time = $time;
        $this->boat = $boat;
        $this->phone = $phone;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail/mails.validation_reserve_subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mails.confirmReserves',
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
