<?php

namespace App\Mail;

use App\Models\Annonce;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactVendeurMail extends Mailable
{
    use Queueable, SerializesModels;

    public $annonce;
    public $request;
    public $contact;

    public function __construct($annonce, $request, $contact)
    {
        $this->annonce = $annonce;
        $this->request = $request;
        $this->contact = $contact;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '📩 Nouvelle demande - ' . $this->annonce->titre,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-vendeur',
        );
    }
}