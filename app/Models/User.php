<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Collection;

class User extends Authenticatable{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'nom',
        'prenom',
        'ville',
        'telephone',
        'score_confiance',
        'role',
        'est_suspendu',
        'suspendu_le',
        'raison_suspension',
       
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
       'score_confiance' => 'integer',
    ];

      protected static function booted()
    {
        static::saving(function ($user) {
            // Si le score change, mettre à jour le rôle automatiquement
            if ($user->isDirty('score_confiance')) {
                if ($user->score_confiance >= 70 && $user->role === 'standard') {
                    $user->role = 'verifie';
                } elseif ($user->score_confiance < 70 && $user->role === 'verifie') {
                    $user->role = 'standard';
                }
            }
        });
    }
    public function estStandard(): bool{
        return $this->role === 'standard';
    }

    public function estVerifie(): bool{
        return $this->role === 'verifie';
    }

    public function estAdmin(): bool{
        return $this->role === 'admin';
    }

   
public function getQuotaAnnoncesAttribute(): int{
    if ($this->role === 'verifie') {
        return 5;
    } elseif ($this->role === 'admin') {
        return 999;
    } else {
        return 3;
    }
}

    
    public function peutPublier(): bool{
        if ($this->estAdmin()) return true;
        
        $nbAnnoncesActives = $this->annonces()
            ->whereIn('etat', ['brouillon', 'en_attente', 'publiee'])
            ->count();
            
        return $nbAnnoncesActives < $this->quota_annonces;
    }

 
public function peutAjouterFavori(): bool{
    if ($this->estAdmin()) return true;
    if ($this->estVerifie()) return true;
    
    return $this->favoris()->count() < 20;
   }

   
   
   public function aValidationAcceleree(): bool{
        return $this->estVerifie();
    }

   
   
    public function mettreAJourStatutVerifie(): void{
        if ($this->score_confiance > 70 && $this->estStandard()) {
            $this->role = 'verifie';
            $this->save();
        }
    }

    public function annonces(){
        return $this->hasMany(Annonce::class, 'user_id');
    }

    public function favoris(){
        return $this->belongsToMany(Annonce::class, 'favoris', 'user_id', 'annonce_id')
                    ->withPivot('date_ajout')
                    ->withTimestamps();
    }

    public function contactsEnvoyes(){
        return $this->hasMany(Contact::class, 'expediteur_id');
    }

    public function contactsRecus(){
        return $this->hasMany(Contact::class, 'destinataire_id');
    }

   
    public function consulterMesAnnonces(): Collection{
        return $this->annonces()->get();
    }

    public function getMesFavoris(): Collection {
        return $this->favoris()->get();
    }

    /**
 * Augmenter le score de confiance
 */
/**
 * Augmenter le score de confiance
 */
public function augmenterConfiance(int $points): void
{
    $this->score_confiance = min(100, $this->score_confiance + $points);
    $this->save();
    
    // 🔥 VÉRIFIER SI L'UTILISATEUR DEVIENT VÉRIFIÉ
    if ($this->score_confiance >= 70 && $this->role === 'standard') {
        $this->role = 'verifie';
        $this->save();
    }
}

/**
 * Diminuer le score de confiance
 */
public function diminuerConfiance(int $points): void
{
    $this->score_confiance = max(0, $this->score_confiance - $points);
    $this->save();
    
    // Si le score descend en dessous de 70, repasser en standard
    if ($this->score_confiance < 70 && $this->role === 'verifie') {
        $this->role = 'standard';
        $this->save();
    }
}

/**
 * Vérifier si l'utilisateur est suspendu
 */
public function estSuspendu(): bool
{
    return $this->est_suspendu == true;
}

}