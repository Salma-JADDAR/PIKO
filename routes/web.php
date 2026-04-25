<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EspeceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================== ROUTES PUBLIQUES ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [AboutController::class, 'index'])->name('about');
Route::get('/annonces', [AnnonceController::class, 'index'])->name('annonces.index');

// ==================== ROUTES D'AUTHENTIFICATION ====================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'afficherlogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'afficherregistre'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ==================== ROUTES PROTÉGÉES (CONNECTÉ) ====================
Route::middleware('auth')->group(function () {
    
    // Profil
    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profil/password', [ProfileController::class, 'password'])->name('profile.password');
    
    // Annonces
    Route::get('/mes-annonces', [AnnonceController::class, 'myListings'])->name('mes-annonces');
    Route::get('/annonces/creer', [AnnonceController::class, 'create'])->name('annonces.create');
    Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store');
    Route::get('/annonces/{id}/modifier', [AnnonceController::class, 'edit'])->name('annonces.edit');
    Route::put('/annonces/{id}', [AnnonceController::class, 'update'])->name('annonces.update');
    Route::post('/annonces/{id}/submit', [AnnonceController::class, 'submit'])->name('annonces.submit');
    Route::post('/annonces/{id}/sold', [AnnonceController::class, 'markAsSold'])->name('annonces.sold');
    Route::delete('/annonces/{id}', [AnnonceController::class, 'destroy'])->name('annonces.destroy');
    Route::post('/annonces/{id}/upload-photos', [AnnonceController::class, 'uploadPhotos'])->name('annonces.upload-photos');
         Route::get('/repondre-acheteur/{contactId}', [ContactController::class, 'repondreAcheteurForm'])->name('repondre.acheteur.form');
    Route::post('/repondre-acheteur', [ContactController::class, 'repondreAcheteurEnvoyer'])->name('repondre.acheteur.envoyer');
    // Favoris - CORRIGÉ (plus de doublons)
    Route::get('/favoris', [FavoriController::class, 'index'])->name('favoris.index');
    Route::match(['post', 'delete'], '/favoris/toggle/{id}', [FavoriController::class, 'toggle'])->name('favoris.toggle');
    Route::delete('/favoris/{id}', [FavoriController::class, 'destroy'])->name('favoris.destroy');
    
    // Photos
    Route::post('/annonces/{annonce}/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::put('/photos/{photo}/principal', [PhotoController::class, 'principal'])->name('photos.principal');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');


    Route::post('/contacts/{annonce}', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/messages/recus', [ContactController::class, 'recus'])->name('contacts.recus');
    Route::get('/messages/envoyes', [ContactController::class, 'envoyes'])->name('contacts.envoyes');
    Route::get('/messages/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/messages/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});

// ==================== ROUTES AVEC ID (DOIT ÊTRE À LA FIN) ====================
Route::get('/annonces/{id}', [AnnonceController::class, 'show'])->name('annonces.show');

// ==================== ROUTES ADMIN ====================
// ==================== ROUTES ADMIN ====================
// ==================== ROUTES ADMIN ====================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Gestion des annonces
    Route::post('/annonces/{annonce}/approuver', [AdminController::class, 'approuver'])->name('annonces.approuver');
    Route::post('/annonces/{annonce}/rejeter', [AdminController::class, 'rejeter'])->name('annonces.rejeter');
    Route::get('/annonces', [AdminController::class, 'toutesAnnonces'])->name('annonces');
    
    // Gestion des utilisateurs
     Route::post('/utilisateurs/{user}/suspendre', [AdminController::class, 'suspendreUtilisateur'])->name('utilisateurs.suspendre');
    Route::post('/utilisateurs/{user}/reactiver', [AdminController::class, 'reactiverUtilisateur'])->name('utilisateurs.reactiver');
    Route::put('/utilisateurs/{user}/role', [AdminController::class, 'changerRole'])->name('utilisateurs.role');
    Route::get('/utilisateurs/{user}/favoris', [AdminController::class, 'voirFavorisUtilisateur'])->name('utilisateurs.favoris');
    
    // Gestion des espèces
      Route::get('/especes', [AdminController::class, 'especesIndex'])->name('especes.index');
    Route::post('/especes', [AdminController::class, 'especeStore'])->name('especes.store');
    Route::put('/especes/{espece}', [AdminController::class, 'especeUpdate'])->name('especes.update');
    Route::post('/especes/{espece}/toggle', [AdminController::class, 'especeToggle'])->name('especes.toggle');
    Route::delete('/especes/{espece}', [AdminController::class, 'especeDestroy'])->name('especes.destroy');
    
    // Messages
    Route::get('/contacts', [AdminController::class, 'tousContacts'])->name('contacts');
    
    // Statistiques
    Route::get('/statistiques', [AdminController::class, 'statistiques'])->name('statistiques');

});;