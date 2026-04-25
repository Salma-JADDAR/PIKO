<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Favori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        $totalAnnonces = Annonce::where('user_id', $user->id)->count();
        $totalVues = Annonce::where('user_id', $user->id)->sum('nb_vues');
        $totalFavoris = Favori::whereHas('annonce', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();
        
        return view('profile.show', compact('user', 'totalAnnonces', 'totalVues', 'totalFavoris'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'telephone' => 'nullable|string|max:20',
            'ville' => 'nullable|string|max:255',
        ]);
        
        // Version alternative avec update() direct
        User::where('id', $user->id)->update([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'ville' => $request->ville,
        ]);
        
        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès !');
    }

    public function password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Le mot de passe actuel est incorrect.');
                }
            }],
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user = Auth::user();
        
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->password),
        ]);
        
        return redirect()->route('profile.show')->with('success', 'Mot de passe modifié avec succès !');
    }
}