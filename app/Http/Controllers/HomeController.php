<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Espece;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Annonces à la une (3 annonces)
        $annoncesUne = Annonce::where('etat', 'publiee')
            ->with(['utilisateur', 'espece', 'photos'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        // DERNIÈRE annonce pour la grande carte (la plus récente)
        $annonceRecente = Annonce::where('etat', 'publiee')
            ->with(['utilisateur', 'espece', 'photos'])
            ->latest('created_at')  // ← La plus récente
            ->first();
        
        $especes = Espece::all();
        
        return view('home', compact('annoncesUne', 'annonceRecente', 'especes'));
    }
}