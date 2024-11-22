<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminReserve extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $dia;
    public $hora;
    public $tour;
    public $boat;
    public $fn;
    public $ln;
    public $phone;


    public function __construct($email, $dia, $hora, $tour, $boat, $fn, $ln, $phone)
    {
        $this->email = $email;
        $this->dia = $dia;
        $this->hora = $hora;
        $this->tour = $tour;
        $this->boat = $boat;
        $this->fn = $fn;
        $this->ln = $ln;
        $this->phone = $phone;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail/mails.admin_reserve_subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mails.adminReserves',
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
