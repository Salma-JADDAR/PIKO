<?php
// app/Http/Controllers/PhotoController.php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // Ajouter des photos
    public function store(Request $request, Annonce $annonce)
    {
        if ($annonce->user_id !== Auth::id()) {
            return back()->with('error', 'Non autorisé.');
        }

        $request->validate([
            'photos' => 'required|array|max:5',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $existingCount = $annonce->photos()->count();
        
        if ($existingCount + count($request->file('photos')) > 5) {
            return back()->with('error', 'Maximum 5 photos par annonce.');
        }

        foreach ($request->file('photos') as $index => $file) {
            $path = $file->store('annonces/' . $annonce->id, 'public');
            
            Photo::create([
                'annonce_id' => $annonce->id,
                'nom_fichier' => $file->getClientOriginalName(),
                'chemin_stockage' => $path,
                'est_principale' => ($existingCount === 0 && $index === 0),
                'date_upload' => now()
            ]);
        }
        
        return back()->with('success', 'Photos ajoutées avec succès.');
    }

    // Définir photo principale
    public function principal(Photo $photo)
    {
        $annonce = $photo->annonce;
        
        if ($annonce->user_id !== Auth::id()) {
            return back()->with('error', 'Non autorisé.');
        }

        DB::transaction(function () use ($photo, $annonce) {
            $annonce->photos()->update(['est_principale' => false]);
            $photo->update(['est_principale' => true]);
        });
        
        return back()->with('success', 'Photo principale mise à jour.');
    }

    // Supprimer une photo
    public function destroy(Photo $photo)
    {
        $annonce = $photo->annonce;
        
        if ($annonce->user_id !== Auth::id()) {
            return back()->with('error', 'Non autorisé.');
        }

        $wasPrimary = $photo->est_principale;
        
        Storage::disk('public')->delete($photo->chemin_stockage);
        $photo->delete();
        
        if ($wasPrimary && $annonce->photos()->count() > 0) {
            $newPrimary = $annonce->photos()->first();
            $newPrimary->update(['est_principale' => true]);
        }
        
        return back()->with('success', 'Photo supprimée.');
    }
}