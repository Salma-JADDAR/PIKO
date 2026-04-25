<?php

namespace App\Mail;

use App\Models\Annonce;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnonceRejeteeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $annonce;
    public $user;
    public $raison;

    public function __construct(Annonce $annonce, User $user, $raison)
    {
        $this->annonce = $annonce;
        $this->user = $user;
        $this->raison = $raison;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' Votre annonce a été rejetée - Piko',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.annonce-rejetee',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}