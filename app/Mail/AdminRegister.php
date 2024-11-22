<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $fn;
    public $ln;
    public $phone;
    public $userpassword;

    public function __construct($email, $fn, $ln, $phone, $userpassword)
    {
        $this->email = $email;
        $this->fn = $fn;
        $this->ln = $ln;
        $this->phone = $phone;
        $this->userpassword = $userpassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail/mails.admin_register_subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mails.adminRegister',
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
