<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Favori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriController extends Controller
{
    /**
     * Afficher la liste des favoris
     */
    public function index()
    {
        $favoris = Favori::where('user_id', Auth::id())
            ->with('annonce', 'annonce.photos', 'annonce.utilisateur')
            ->latest('date_ajout')
            ->paginate(12);
        
        return view('favoris.index', compact('favoris'));
    }

    /**
     * Ajouter ou retirer une annonce des favoris (sans AJAX)
     */
    public function toggle($id)
    {
        $annonce = Annonce::findOrFail($id);
        $user = Auth::user();
        
        $favori = Favori::where('user_id', $user->id)
            ->where('annonce_id', $annonce->id)
            ->first();
        
        if ($favori) {
            $favori->delete();
            return redirect()->back()->with('success', ' Annonce retirée des favoris');
        } else {
            Favori::create([
                'user_id' => $user->id,
                'annonce_id' => $annonce->id,
                'date_ajout' => now()
            ]);
            return redirect()->back()->with('success', ' Annonce ajoutée aux favoris');
        }
    }

    /**
     * Supprimer un favori (depuis la page mes favoris)
     */
    public function destroy($id)
    {
        $favori = Favori::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        
        $favori->delete();
        
        return redirect()->back()->with('success', 'Annonce retirée des favoris');
    }
}