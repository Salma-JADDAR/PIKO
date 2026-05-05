<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Espece;
use App\Models\User;
use App\Models\Favori;
use App\Models\Contact;
use App\Mail\AnnonceApprouveeMail;
use App\Mail\AnnonceRejeteeMail;
use App\Mail\UtilisateurSuspenduMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Mail\UtilisateurReactiveMail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingAds = Annonce::with(['utilisateur', 'espece'])
            ->where('etat', 'en_attente')
            ->orderBy('created_at', 'desc')
            ->paginate(10);


        $totalActiveSpecies = Espece::where('est_active', true)->count();

        $suspendedUsers = User::where('est_suspendu', true)
         ->orderBy('suspendu_le', 'desc')
         ->paginate(10);

      
        $allUsers = User::orderBy('created_at', 'desc')->paginate(6);

        $allSpecies = Espece::orderBy('nom_commun')->paginate(6);

        $stats = [
            'total_users' => User::count(),
            'total_ads' => Annonce::count(),
            'total_pending' => Annonce::where('etat', 'en_attente')->count(),
            'total_published' => Annonce::where('etat', 'publiee')->count(),
            'total_species' => Espece::count(),
            'total_favorites' => Favori::count(),
        ];

        return view('admin.dashboard', compact('pendingAds','totalActiveSpecies','suspendedUsers','allSpecies', 'stats','allUsers' ));
    }

    public function approuver(Request $request, Annonce $annonce)
    {
        DB::transaction(function () use ($annonce) {
            $annonce->update([
                'etat' => 'publiee',
                'date_publication' => now()
            ]);
            $annonce->espece->incrementerCompteur();
            $annonce->utilisateur->augmenterConfiance(5);
        });

        try {
            Mail::to($annonce->utilisateur->email)->send(new AnnonceApprouveeMail($annonce, $annonce->utilisateur));
        } catch (\Exception $e) {
            Log::error('Erreur envoi email approbation: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Annonce approuvée avec succès ✅ +5 points de confiance.');
    }

    public function rejeter(Request $request, Annonce $annonce)
    {
        $request->validate([
            'raison' => 'required|string|min:10|max:500'
        ]);

        DB::transaction(function () use ($annonce, $request) {
            $annonce->update([
                'etat' => 'archivee',
                'raison_rejet' => $request->raison
            ]);
            $annonce->utilisateur->diminuerConfiance(10);
        });

        try {
            Mail::to($annonce->utilisateur->email)->send(new AnnonceRejeteeMail($annonce, $annonce->utilisateur, $request->raison));
        } catch (\Exception $e) {
            Log::error('Erreur envoi email rejet: ' . $e->getMessage());
        }

        return redirect()->back()->with('error', 'Annonce rejetée ❌ -10 points de confiance.');
    }
   public function suspendreUtilisateur(Request $request, User $user)
{
    $request->validate([
        'duree_jours' => 'required|integer|min:1|max:365',
        'raison' => 'required|string|min:10|max:500'
    ]);

    $user->update([
        'score_confiance' => max(0, $user->score_confiance - 20),
        'est_suspendu' => true,
        'suspendu_le' => now(),  // ← AJOUTE CETTE LIGNE
        'raison_suspension' => $request->raison  // ← AJOUTE CETTE LIGNE
    ]);

    // Envoyer l'email
    Mail::send('emails.utilisateur-suspendu', [
        'user' => $user,
        'duree' => $request->duree_jours,
        'raison' => $request->raison
    ], function ($message) use ($user) {
        $message->to($user->email)
                ->subject('⚠️ Votre compte a été suspendu - Piko');
    });

    return redirect()->back()->with('success', "Utilisateur suspendu pour {$request->duree_jours} jours.");
}
   public function reactiverUtilisateur(User $user)
{
    $user->update([
        'score_confiance' => min(100, $user->score_confiance + 15),
        'est_suspendu' => false,
        'suspendu_le' => null,
        'raison_suspension' => null
    ]);

    return back()->with('success', "Utilisateur {$user->prenom} {$user->nom} réactivé ✅");
}

    public function changerRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:standard,verifie,admin'
        ]);

        $currentUser = auth()->guard()->user();
        
        if (!$currentUser) {
            return redirect()->route('login')->with('error', 'Session expirée, veuillez vous reconnecter.');
        }
        
        if ($currentUser->id === $user->id) {
            return back()->with('error', 'Vous ne pouvez pas modifier votre propre rôle.');
        }

        $user->role = $request->role;
        $user->save();

        return back()->with('success', "Rôle de {$user->prenom} {$user->nom} modifié avec succès.");
    }

    public function toutesAnnonces(Request $request)
    {
        $query = Annonce::with(['utilisateur', 'espece', 'photos']);
        
        if ($request->filled('status')) {
            $query->where('etat', $request->status);
        }
        
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        
        $annonces = $query->orderBy('created_at', 'desc')->paginate(20);
        $statusCounts = [
            'brouillon' => Annonce::where('etat', 'brouillon')->count(),
            'en_attente' => Annonce::where('etat', 'en_attente')->count(),
            'publiee' => Annonce::where('etat', 'publiee')->count(),
            'vendue' => Annonce::where('etat', 'vendue')->count(),
            'archivee' => Annonce::where('etat', 'archivee')->count(),
        ];
        
        return view('admin.toutes-annonces', compact('annonces', 'statusCounts'));
    }

    public function voirFavorisUtilisateur(User $user)
    {
        $favoris = $user->favoris()->with(['espece', 'photos'])->paginate(20);
        return view('admin.favoris-utilisateur', compact('user', 'favoris'));
    }

    public function especesIndex()
    {
        $especes = Espece::orderBy('nom_commun')->paginate(15);
        return view('admin.especes', compact('especes'));
    }
    
public function especeStore(Request $request)
{
    $request->validate([
        'nom_commun' => 'required|string|max:255|unique:especes',
        'categorie' => 'required|string|max:255',
        'difficulte_elevage' => 'required|integer|min:1|max:5',
    ]);

    $espece = new Espece();
    $espece->nom_commun = $request->nom_commun;
    $espece->categorie = $request->categorie;
    $espece->difficulte_elevage = $request->difficulte_elevage;
    $espece->est_active = true;
    $espece->nb_annonces_actives = 0;
    $espece->save();

    return redirect()->back()->with('success', 'Espèce ajoutée avec succès ✅');
}
    public function especeUpdate(Request $request, Espece $espece)
{
    $request->validate([
        'nom_commun' => 'required|string|max:255|unique:especes,nom_commun,' . $espece->id,
        'categorie' => 'required|string|max:255',
        'difficulte_elevage' => 'required|integer|min:1|max:5',
    ]);

    $espece->update([
        'nom_commun' => $request->nom_commun,
        'categorie' => $request->categorie,
        'difficulte_elevage' => $request->difficulte_elevage,
    ]);

    return redirect()->back()->with('success', 'Espèce modifiée avec succès ✅');
}

    public function especeToggle(Espece $espece)
    {
        $espece->update(['est_active' => !$espece->est_active]);
        return redirect()->back()->with('success', $espece->est_active ? 'Espèce activée ✅' : 'Espèce désactivée ❌');
    }

    public function especeDestroy(Espece $espece)
    {
        if ($espece->annonces()->count() > 0) {
            return back()->with('error', 'Impossible de supprimer : des annonces sont associées à cette espèce.');
        }
        
        $espece->delete();
        return redirect()->back()->with('success', 'Espèce supprimée ');
    }

    public function tousContacts()
    {
        $contacts = Contact::with(['expediteur', 'destinataire', 'annonce'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        return view('admin.contacts', compact('contacts'));
    }

    public function statistiques()
    {
        $annoncesParMois = Annonce::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as mois'),
                DB::raw('count(*) as total')
            )
            ->groupBy('mois')
            ->orderBy('mois', 'desc')
            ->take(12)
            ->get();
        
        $topVendeurs = User::withCount(['annonces' => function($q) {
                $q->where('etat', 'publiee');
            }])
            ->orderBy('annonces_count', 'desc')
            ->take(10)
            ->get();
        
        return view('admin.statistiques', compact('annoncesParMois', 'topVendeurs'));
    }
}