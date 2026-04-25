<?php
namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Annonce;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        // Supprimer les anciennes photos (optionnel)
        Photo::truncate();
        
        foreach (Annonce::all() as $annonce) {
            // Pour chaque annonce, créer 5 photos
            for ($i = 1; $i <= 5; $i++) {
                $isPrincipal = ($i === 1); // La première photo (i=1) est principale
                $imageName = $isPrincipal ? 'a' . $annonce->id . '.png' : 'a' . $annonce->id . $i . '.png';
                
                Photo::create([
                    'annonce_id' => $annonce->id,
                    'nom_fichier' => $imageName,
                    'chemin_stockage' => 'storage/images/' . $imageName,
                    'est_principale' => $isPrincipal,
                    'date_upload' => now(),
                ]);
            }
        }
    }
}