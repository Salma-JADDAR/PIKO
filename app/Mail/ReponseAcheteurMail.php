<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReponseAcheteurMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $request;

    public function __construct($contact, $request)
    {
        $this->contact = $contact;
        $this->request = $request;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📩 Réponse à votre demande - ' . $this->contact->annonce->titre,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reponse-acheteur',
        );
    }
}