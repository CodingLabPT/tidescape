<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Contacts extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $status;
    public $resposta;
    public $mensagem;
    public $msg_criada_em;
    public $local;

    /**
     * Create a new message instance.
     */
    public function __construct($local, $name, $email, $status, $phone, $resposta, $mensagem, $msg_criada_em)
    {
        $this->local = $local;
        $this->name = $name;
        $this->email = $email;
        $this->status = $status;
        $this->phone = $phone;
        $this->resposta = $resposta;
        $this->mensagem = $mensagem;
        $this->msg_criada_em = $msg_criada_em;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('mail/mails.contact_subject'),
        );
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mails.contact',
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
