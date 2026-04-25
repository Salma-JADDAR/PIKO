<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use App\Models\Espece;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReponseAcheteurMail;

/**
 * @property-read User $user
 */

class AnnonceController extends Controller
{
   
    public function index(Request $request)
    {
        $query = Annonce::with(['utilisateur', 'espece', 'photos']);
        
        if ($request->filled('status')) {
            if ($request->status == 'publiee') {
                $query->where('etat', 'publiee');
            } elseif ($request->status == 'vendue') {
                $query->where('etat', 'vendue');
            }
        } else {
            $query->whereIn('etat', ['publiee', 'vendue']);
        }
        
        if ($request->filled('espece')) {
            $query->where('espece_id', $request->espece);
        }
        
        if ($request->filled('prix')) {
            if ($request->prix == '0-100') {
                $query->whereBetween('prix', [0, 100]);
            } elseif ($request->prix == '100-500') {
                $query->whereBetween('prix', [100, 500]);
            } elseif ($request->prix == '500-1000') {
                $query->whereBetween('prix', [500, 1000]);
            } elseif ($request->prix == '1000-2000') {
                $query->whereBetween('prix', [1000, 2000]);
            } elseif ($request->prix == '2000+') {
                $query->where('prix', '>=', 2000);
            }
        }
        
        if ($request->filled('ville')) {
            $query->whereHas('utilisateur', function($q) use ($request) {
                $q->where('ville', 'like', '%' . $request->ville . '%');
            });
        }
        
        switch ($request->get('sort', 'latest')) {
            case 'price_asc':
                $query->orderBy('prix', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('prix', 'desc');
                break;
            case 'views':
                $query->orderBy('nb_vues', 'desc');
                break;
            default:
                $query->latest('date_publication');
        }
        
        $annonces = $query->paginate(6);
        
        $totalCount = Annonce::whereIn('etat', ['publiee', 'vendue'])->count();
        $publishedCount = Annonce::where('etat', 'publiee')->count();
        $soldCount = Annonce::where('etat', 'vendue')->count();
        
        $especesList = Espece::where('est_active', true)->get();
        
        return view('annonces.index', compact('annonces', 'especesList', 'totalCount', 'publishedCount', 'soldCount'));
    }
    
 public function create()
{
    $user = Auth::user();
    
    // تحقق من وجود المستخدم
    if (!$user) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
    }
    
    if (!$user->peutPublier()) {
        return redirect()->route('mes-annonces')
            ->with('error', 'Vous avez atteint votre limite d\'annonces.');
    }
    
    $especes = Espece::where('est_active', true)->get();
    return view('annonces.create', compact('especes'));
}
    
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:60',
            'description' => 'required',
            'prix' => 'required|numeric|min:0',
            'espece_id' => 'required|exists:especes,id',
            'photos' => 'required|array|max:5',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'photo_principale_index' => 'nullable|integer|min:0|max:4'
        ]);

        $photoCount = $request->hasFile('photos') ? count($request->file('photos')) : 0;
        
        if ($photoCount < 1) {
            return back()->with('error', 'Vous devez sélectionner au moins 1 photo.')
                         ->withInput();
        }
        
        if ($photoCount > 5) {
            return back()->with('error', 'Vous ne pouvez pas sélectionner plus de 5 photos. (' . $photoCount . ' sélectionnées)')
                         ->withInput();
        }

        DB::beginTransaction();
        
        try {
            $annonce = Annonce::create([
                'titre' => $request->titre,
                'description' => $request->description,
                'prix' => $request->prix,
                'espece_id' => $request->espece_id,
                'user_id' => Auth::id(),
                'etat' => 'brouillon',
                'nb_vues' => 0,
                'date_publication' => null
            ]);
            
            $createdPhotos = [];
            
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $index => $file) {
                    $path = $file->store('annonces/' . $annonce->id, 'public');
                    
                    $photo = Photo::create([
                        'annonce_id' => $annonce->id,
                        'nom_fichier' => $file->getClientOriginalName(),
                        'chemin_stockage' => $path,
                        'est_principale' => false,
                        'date_upload' => now()
                    ]);
                    
                    $createdPhotos[] = $photo;
                }
            }
            
            $principalIndex = $request->has('photo_principale_index') ? (int)$request->photo_principale_index : 0;
            
            if (isset($createdPhotos[$principalIndex])) {
                $annonce->photos()->update(['est_principale' => false]);
                $createdPhotos[$principalIndex]->update(['est_principale' => true]);
            } elseif (count($createdPhotos) > 0) {
                $createdPhotos[0]->update(['est_principale' => true]);
            }
            
            DB::commit();
            return redirect()->route('annonces.show', $annonce)
                ->with('success', 'Annonce créée avec succès ! (' . $photoCount . ' photo(s) ajoutée(s))');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur lors de la création : ' . $e->getMessage());
        }
    }
    
   public function show($id)
{
    $annonce = Annonce::with(['utilisateur', 'espece', 'photos'])->findOrFail($id);
    
    // Vérifier si l'utilisateur a déjà vu cette annonce dans cette session
    $sessionKey = 'viewed_annonce_' . $id;
    if (!session()->has($sessionKey)) {
        $annonce->increment('nb_vues');
        session()->put($sessionKey, true);
    }
    
    $estFavori = false;
    if (Auth::check()) {
        $estFavori = $annonce->favoris()->where('user_id', Auth::id())->exists();
    }
    
    return view('annonces.show', compact('annonce', 'estFavori'));
}

    /**
     * MODIFIÉ : Vérification de l'état de l'annonce
     */
    public function edit($id)
    {
        $annonce = Annonce::findOrFail($id);
        
        // Vérifier que l'utilisateur est le propriétaire
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cette annonce.');
        }
        
        // 🔥 NOUVEAU : Vérifier si l'annonce peut être modifiée
        if (!$annonce->peutEtreModifiee()) {
            $statuts = [
                'brouillon' => 'brouillon',
                'en_attente' => 'en attente de validation',
                'publiee' => 'publiée',
                'vendue' => 'vendue',
                'archivee' => 'archivée'
            ];
            $statut = $statuts[$annonce->etat] ?? $annonce->etat;
            return redirect()->route('mes-annonces')
                ->with('error', "Cette annonce ne peut plus être modifiée car elle est {$statut}.");
        }
        
        $especes = Espece::where('est_active', true)->get();
        return view('annonces.edit', compact('annonce', 'especes'));
    }

    /**
     * MODIFIÉ : Vérification de l'état de l'annonce
     */
    public function update(Request $request, $id)
    {
        $annonce = Annonce::findOrFail($id);
        
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cette annonce.');
        }
        
     
        if (!$annonce->peutEtreModifiee()) {
            return redirect()->route('mes-annonces')
                ->with('error', 'Cette annonce ne peut plus être modifiée.');
        }
        
        $request->validate([
            'titre' => 'required|max:60',
            'description' => 'required',
            'prix' => 'required|numeric|min:0',
            'espece_id' => 'required|exists:especes,id',
            'photo_principale_id' => 'nullable|exists:photos,id',
            'photos_to_delete' => 'nullable|string',
            'new_photos' => 'nullable|array|max:' . (5 - $annonce->photos->count()),
            'new_photos.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        DB::beginTransaction();
        
        try {
            $annonce->update([
                'titre' => $request->titre,
                'description' => $request->description,
                'prix' => $request->prix,
                'espece_id' => $request->espece_id
            ]);
            
            if ($request->filled('photos_to_delete')) {
                $photosToDelete = explode(',', $request->photos_to_delete);
                foreach ($photosToDelete as $photoId) {
                    $photo = Photo::find($photoId);
                    if ($photo && $photo->annonce_id == $annonce->id) {
                        Storage::disk('public')->delete($photo->chemin_stockage);
                        $photo->delete();
                    }
                }
            }
            
            if ($request->filled('photo_principale_id')) {
                $annonce->photos()->update(['est_principale' => false]);
                $newPrincipal = Photo::find($request->photo_principale_id);
                if ($newPrincipal && $newPrincipal->annonce_id == $annonce->id) {
                    $newPrincipal->update(['est_principale' => true]);
                }
            }
            
            if ($request->hasFile('new_photos')) {
                foreach ($request->file('new_photos') as $file) {
                    $path = $file->store('images', 'public');
                    Photo::create([
                        'annonce_id' => $annonce->id,
                        'nom_fichier' => $file->getClientOriginalName(),
                        'chemin_stockage' => $path,
                        'est_principale' => $annonce->photos()->count() === 0,
                        'date_upload' => now()
                    ]);
                }
            }
            
            DB::commit();
            return redirect()->route('mes-annonces')  
                ->with('success', 'Annonce modifiée avec succès !');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erreur : ' . $e->getMessage());
        }
    }

    public function submit($id)
    {
        $annonce = Annonce::findOrFail($id);
        
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à soumettre cette annonce.');
        }
        
        // Vérifier que l'annonce est bien en brouillon
        if ($annonce->etat !== 'brouillon') {
            return back()->with('error', 'Seules les annonces en brouillon peuvent être soumises.');
        }
        
        $annonce->update([
            'etat' => 'en_attente'
        ]);
        
        return back()->with('success', 'Annonce soumise pour validation.');
    }

    public function markAsSold($id)
    {
        $annonce = Annonce::findOrFail($id);
        
        if ($annonce->user_id !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cette annonce.');
        }
        
        // Vérifier que l'annonce est publiée
        if ($annonce->etat !== 'publiee') {
            return back()->with('error', 'Seules les annonces publiées peuvent être marquées comme vendues.');
        }
        
        DB::transaction(function () use ($annonce) {
            $annonce->update([
                'etat' => 'vendue'
            ]);
            
            $annonce->espece->decrement('nb_annonces_actives');
        });
        
        return back()->with('success', 'Annonce marquée comme vendue.');
    }

    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);
        $user = Auth::user();
        
        if ($annonce->user_id !== $user->id && $user->role !== 'admin') {
            abort(403, 'Vous n\'êtes pas autorisé à supprimer cette annonce.');
        }
        
        DB::transaction(function () use ($annonce) {
            foreach ($annonce->photos as $photo) {
                Storage::disk('public')->delete($photo->chemin_stockage);
                $photo->delete();
            }
            
            if ($annonce->etat === 'publiee') {
                $annonce->espece->decrement('nb_annonces_actives');
            }
            
            $annonce->delete();
        });
        
        return redirect()->route('mes-annonces')
            ->with('success', 'Annonce supprimée avec succès.');
    }

    public function myListings(Request $request)
{
    $allAnnoncesQuery = Annonce::where('user_id', Auth::id());
    
    $query = Annonce::where('user_id', Auth::id())->with('espece', 'photos');
    
    if ($request->filled('status')) {
        $query->where('etat', $request->status);
    }
    
    // 🔥 CHANGE ICI : 6 au lieu de 10 pour avoir 2 lignes de 3 cartes
    $annonces = $query->latest()->paginate(6);
    
    // Statistiques globales
    $totalAnnonces = $allAnnoncesQuery->count();
    $totalVues = $allAnnoncesQuery->sum('nb_vues');
    $enAttenteCount = $allAnnoncesQuery->where('etat', 'en_attente')->count();
    $publieeCount = $allAnnoncesQuery->where('etat', 'publiee')->count();
    $brouillonCount = $allAnnoncesQuery->where('etat', 'brouillon')->count();
    $vendueCount = $allAnnoncesQuery->where('etat', 'vendue')->count();
    $archiveeCount = $allAnnoncesQuery->where('etat', 'archivee')->count();
    
    return view('annonces.mes-annonces', compact(
        'annonces', 
        'totalAnnonces', 
        'totalVues', 
        'enAttenteCount', 
        'publieeCount',
        'brouillonCount',
        'vendueCount',
        'archiveeCount'
    ));
}

    public function uploadPhotos(Request $request, $id)
    {
        $annonce = Annonce::findOrFail($id);
        
        if ($annonce->user_id !== Auth::id()) {
            return back()->with('error', 'Non autorisé');
        }
        
        // Vérifier si on peut ajouter des photos
        if (!$annonce->peutEtreModifiee()) {
            return back()->with('error', 'Cette annonce ne peut plus être modifiée.');
        }
        
        $request->validate([
            'new_photos' => 'required|array|max:' . (5 - $annonce->photos->count()),
            'new_photos.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        foreach ($request->file('new_photos') as $file) {
            $path = $file->store('images', 'public');
            Photo::create([
                'annonce_id' => $annonce->id,
                'nom_fichier' => $file->getClientOriginalName(),
                'chemin_stockage' => $path,
                'est_principale' => $annonce->photos->count() === 0,
                'date_upload' => now()
            ]);
        }
        
        return back()->with('success', 'Photos ajoutées avec succès');
    }

   
}