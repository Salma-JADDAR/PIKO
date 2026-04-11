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
        ->with(['utilisateur', 'espece', 'photos'])  // Change 'user' → 'utilisateur'
        ->orderBy('created_at', 'desc')
        ->limit(4)
        ->get();
    
    $especes = Espece::all();
    
    return view('home', compact('annoncesUne', 'especes'));
}
}