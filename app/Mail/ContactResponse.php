<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $msg;
    public $resp;
    public $resp_obtida_em;
    public $msg_enviada_em;
    public $locale;

    public function __construct($locale, $status, $msg, $resp, $resp_obtida_em, $msg_enviada_em)
    {
        $this->status = $status;
        $this->msg = $msg;
        $this->resp = $resp;
        $this->locale = $locale;
        $this->resp_obtida_em = $resp_obtida_em;
        $this->msg_enviada_em = $msg_enviada_em;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        return new Envelope(
            subject: __('mail/mails.contact_response_subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.contactResponse',
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
