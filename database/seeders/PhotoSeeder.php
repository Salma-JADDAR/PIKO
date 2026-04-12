<?php
namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Annonce;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $images = ['a1.png', 'a2.png', 'a3.png'];
        
        foreach (Annonce::all() as $i => $annonce) {
            Photo::create([
                'annonce_id' => $annonce->id,
                'chemin_stockage' => 'storage/images/' . $images[$i % 3],
                'est_principale' => true,
            ]);
        }
    }
}