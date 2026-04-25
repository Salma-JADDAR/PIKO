<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\ContactVendeurMail;
use App\Mail\ReponseAcheteurMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    // Envoyer un message à un vendeur
    public function store(Request $request, $annonceId)
    {
        $annonce = Annonce::findOrFail($annonceId);

        if (Auth::id() == $annonce->user_id) {
            return back()->with('error', 'Vous ne pouvez pas vous contacter vous-même.');
        }

         $contactExistant = Contact::where('annonce_id', $annonce->id)
        ->where('expediteur_id', Auth::id())
        ->where('reponse_envoyee', true)
        ->exists();

    if ($contactExistant) {
        return back()->with('error', 'Vous avez déjà contacté ce vendeur pour cette annonce et il vous a répondu. Vous ne pouvez pas envoyer un autre message.');
    }

        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10|max:2000'
        ]);

        DB::beginTransaction();

        try {
            $contact = Contact::create([
                'annonce_id' => $annonce->id,
                'expediteur_id' => Auth::id(),
                'destinataire_id' => $annonce->user_id,
                'nom_acheteur' => $request->nom,
                'email_acheteur_masque' => $this->masquerEmail($request->email),
                'message' => $request->message,
                'date_envoi' => now(),
            ]);

            // Envoyer l'email au vendeur
            Mail::to($annonce->utilisateur->email)->send(new ContactVendeurMail($annonce, $request, $contact));

            DB::commit();
            return back()->with('success', 'Message envoyé !');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur envoi: ' . $e->getMessage());
            return back()->with('error', 'Erreur: ' . $e->getMessage());
        }
    }

    // Formulaire pour répondre à l'acheteur
     public function repondreAcheteurForm($contactId)
{
    $contact = Contact::with('annonce')->findOrFail($contactId);

    // Autoriser uniquement le propriétaire de l'annonce (le vendeur)
    if ($contact->annonce->user_id != Auth::id()) {
        abort(403, 'Vous n\'êtes pas autorisé à répondre à ce message.');
    }

    if ($contact->reponse_envoyee) {
        return redirect()->route('annonces.show', $contact->annonce_id)
            ->with('info', 'Vous avez déjà répondu à cet acheteur.');
    }

    // Récupérer le téléphone du vendeur (propriétaire de l'annonce)
    $telephoneVendeur = $contact->annonce->utilisateur->telephone ?? ''; // ou 'phone' selon ton champ

    return view('annonces.repondre-acheteur', compact('contact', 'telephoneVendeur'));
}
    // Envoyer la réponse à l'acheteur
    public function repondreAcheteurEnvoyer(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'message' => 'required|string|min:10|max:2000',
            'telephone' => 'nullable|string|max:20'
        ]);

        $contact = Contact::with('annonce', 'expediteur')->findOrFail($request->contact_id);

        if ($contact->destinataire_id != Auth::id()) {
            abort(403);
        }

        if ($contact->reponse_envoyee) {
            return back()->with('info', 'Déjà répondu.');
        }

        // Email de l'acheteur = expediteur->email
        $emailAcheteur = $contact->expediteur->email;

        Mail::to($emailAcheteur)->send(new ReponseAcheteurMail($contact, $request));

        $contact->update([
            'reponse_envoyee' => true,
            'date_reponse' => now(),
        ]);

        return redirect()->route('annonces.show', $contact->annonce_id)
            ->with('success', 'Réponse envoyée. Vous pouvez marquer comme vendue.');
    }

    private function masquerEmail($email)
    {
        $parts = explode('@', $email);
        $name = $parts[0];
        $domain = $parts[1] ?? '';
        if (strlen($name) <= 3) {
            $masque = substr($name, 0, 1) . str_repeat('*', strlen($name) - 1);
        } else {
            $masque = substr($name, 0, 2) . str_repeat('*', strlen($name) - 3) . substr($name, -1);
        }
        return $masque . '@' . $domain;
    }
}