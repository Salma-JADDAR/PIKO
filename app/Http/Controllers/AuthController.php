<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    
    public function afficherlogin(){
        return view('auth.login');
    }
    
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    
    if (Auth::attempt($credentials, $request->has('remember'))) {
        $user = Auth::user();
        
        // 🔥 Vérifier si l'utilisateur est suspendu
        if ($user->est_suspendu) {
            Auth::logout();
            return back()->withErrors([
                'email' => '⚠️ Votre compte est suspendu. Veuillez contacter le support.'
            ]);
        }
        
        $request->session()->regenerate();
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->intended('/');
    }
    
    return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
}
      
    
    public function afficherregistre(){
        return view('auth.register');
    }
    
   public function register(Request $request){
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'ville' => 'required|max:255',
            'telephone' => 'nullable|max:20'
        ]);
        
        $user = User::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'ville' => $validated['ville'],
            'telephone' => $validated['telephone'],
            'score_confiance' => 50,
            'role' => 'standard'
        ]);
        
        Auth::login($user);
        
        return redirect('/')->with('success', 'Bienvenue !');
    }
    
   public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}