<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Photo extends Model{
    use HasFactory;

    protected $table = 'photos';
    
    protected $fillable = [
        'nom_fichier',
        'chemin_stockage',
        'est_principale',
        'date_upload',
        'annonce_id',
    ];

    protected $casts = [
        'date_upload' => 'datetime',
        'est_principale' => 'boolean',
    ];


    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }

    
  
    public function getUrlAttribute(): string{
        return Storage::url($this->chemin_stockage);
    }
}