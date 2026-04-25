<?php
namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Annonce;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        
        Photo::truncate();
        
        foreach (Annonce::all() as $annonce) {
         
            for ($i = 1; $i <= 5; $i++) {
                $isPrincipal = ($i === 1);
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