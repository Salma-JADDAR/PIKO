<?php
namespace Database\Factories;

use App\Models\Photo;
use App\Models\Annonce;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory{
    protected $model = Photo::class;

    public function definition(): array{
        $images = [
            'a1.png',
            'a2.png',
            'a3.png',
        ];
        
        $image = $this->faker->randomElement($images);
        
        return [
            'nom_fichier' => $image,
            'chemin_stockage' => 'storage/images/' . $image,
            'est_principale' => false,
            'date_upload' => now(),
            // 'annonce_id' => Annonce::factory(), ← À SUPPRIMER
        ];
    }

    public function principale(){
        return $this->state([
            'est_principale' => true,
        ]);
    }
}