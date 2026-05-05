<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Espece;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
  
        $annoncesUne = Annonce::where('etat', 'publiee')
            ->with(['utilisateur', 'espece', 'photos'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        
        
        $annonceRecente = Annonce::where('etat', 'publiee')
            ->with(['utilisateur', 'espece', 'photos'])
            ->latest('created_at') 
            ->first();
        
        $especes = Espece::all();
        
        return view('home', compact('annoncesUne', 'annonceRecente', 'especes'));
    }
}