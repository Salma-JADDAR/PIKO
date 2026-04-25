<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UtilisateurSuspenduMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $duree;
    public $raison;

    public function __construct(User $user, $duree, $raison)
    {
        $this->user = $user;
        $this->duree = $duree;
        $this->raison = $raison;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '⚠️ Votre compte a été suspendu - Piko',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.utilisateur-suspendu',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}