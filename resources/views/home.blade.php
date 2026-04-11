<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Marketplace aviaire premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7f5;
            color: #1a1a1a;
            scroll-behavior: smooth;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #e8ecef;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 32px;
        }

        .logo a {
            text-decoration: none;
        }
        .logo h1 {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            align-items: center;
            flex: 1;
            justify-content: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #4a5568;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
        }
        .nav-links a:hover, .nav-links a.active {
            color: #2d6a4f;
        }

        .auth-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }
        .btn-login {
            padding: 8px 24px;
            border: 1.5px solid #2d6a4f;
            border-radius: 40px;
            color: #2d6a4f;
            background: transparent;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: #2d6a4f;
            color: white;
            transform: translateY(-2px);
        }
        .btn-register {
            padding: 8px 24px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            border-radius: 40px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3);
        }

        /* User Menu */
        .user-menu {
            position: relative;
            cursor: pointer;
        }
        .user-avatar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: #e8f0e6;
            border-radius: 40px;
            transition: all 0.3s ease;
        }
        .user-avatar i {
            font-size: 16px;
            color: #2d6a4f;
        }
        .user-avatar span {
            font-size: 14px;
            font-weight: 500;
            color: #2d6a4f;
        }
        .user-avatar i:last-child {
            font-size: 12px;
            transition: transform 0.3s;
        }
        .user-menu:hover .user-avatar {
            background: #d4e4d0;
        }
        .user-menu:hover .user-avatar i:last-child {
            transform: rotate(180deg);
        }
        .user-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 12px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            min-width: 220px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 100;
        }
        .user-menu:hover .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .user-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            text-decoration: none;
            color: #4a5568;
            font-size: 13px;
            transition: all 0.2s;
        }
        .user-dropdown a:hover {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .user-dropdown a i {
            width: 18px;
            color: #86a788;
        }
        .user-dropdown hr {
            margin: 8px 0;
            border: none;
            border-top: 1px solid #eef2f0;
        }

        /* Mobile */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #2d6a4f;
            cursor: pointer;
        }
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 350px;
            height: 100%;
            background: white;
            box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
            z-index: 1001;
            transition: right 0.3s ease;
            overflow-y: auto;
        }
        .mobile-menu.active { right: 0; }
        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eef2f0;
        }
        .mobile-menu-header .logo h1 { font-size: 24px; }
        .mobile-menu-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #2d6a4f;
            cursor: pointer;
        }
        .mobile-menu-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .mobile-nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            text-decoration: none;
            color: #4a5568;
            font-size: 15px;
            border-radius: 12px;
            transition: all 0.2s;
        }
        .mobile-nav-item:hover {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .mobile-nav-item i { width: 24px; color: #86a788; }
        .btn-mobile-primary {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white !important;
            justify-content: center;
        }
        .btn-mobile-primary i { color: white !important; }
        .mobile-menu hr { margin: 8px 0; border-top: 1px solid #eef2f0; }
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }
        .mobile-overlay.active { display: block; }

        /* Hero Section - SEULE L'IMAGE EST FIXE (effet parallax) */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        /* Image de fond fixe */
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("{{ asset('images/Cap.PNG') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            z-index: 0;
        }
        /* Overlay sombre */
        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.7) 100%);
        }
        /* Contenu qui défile normalement */
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            padding: 60px 32px;
            color: white;
            text-align: left;
            margin-left: 2%;
        }
        .hero-content h1 {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -1px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .hero-content p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 32px;
            opacity: 0.95;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
        }
        .hero-btn {
            display: inline-block;
            padding: 14px 36px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            background: linear-gradient(135deg, #2d6a4f, #1e4620);
        }

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 32px;
        }
        .section-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
            text-align: center;
        }
        .section-subtitle {
            color: #6c757d;
            margin-bottom: 48px;
            font-size: 16px;
            text-align: center;
        }

        /* Cards Grid */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }
        .card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .card-img {
            height: 220px;
            background: linear-gradient(135deg, #e8ecef, #d4d8dc);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .card:hover .card-img img { transform: scale(1.05); }
        .card-img i { font-size: 48px; color: #86a788; }
        .card-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            z-index: 2;
        }
        .badge-verified { background: #e8f5e9; color: #2e7d32; }
        .badge-featured { background: #fff3e0; color: #e65100; }
        .card-content { padding: 20px; }
        .card-title { font-size: 18px; font-weight: 700; margin-bottom: 8px; }
        .card-price { font-size: 22px; font-weight: 800; color: #2d6a4f; margin: 10px 0; }
        .card-location { font-size: 13px; color: #6c757d; display: flex; align-items: center; gap: 6px; }
        .card-tag { display: inline-block; font-size: 11px; background: #f0f2f0; padding: 4px 10px; border-radius: 20px; color: #86a788; margin-top: 10px; }

        /* Banner */
        .banner {
            background: linear-gradient(135deg, #e8f0e6 0%, #c8dcc4 100%);
            border-radius: 40px;
            text-align: center;
            padding: 60px;
            margin: 40px 0;
        }
        .banner h2 { font-size: 36px; margin-bottom: 16px; }
        .banner p { font-size: 16px; color: #4a5b4d; margin-bottom: 32px; }

        /* Steps */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 48px;
            text-align: center;
            margin-top: 40px;
        }
        .step-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #e8f0e6, #d4e4d0);
            border-radius: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 40px;
            color: #2d6a4f;
            transition: transform 0.3s;
        }
        .step-icon:hover { transform: scale(1.05); }
        .step-title { font-size: 22px; font-weight: 700; margin-bottom: 12px; }
        .step-desc { color: #6c757d; font-size: 14px; line-height: 1.6; }

        /* Security */
        .security-section {
            background: linear-gradient(135deg, #1a2e1a 0%, #1e4620 100%);
            color: white;
            border-radius: 40px;
            padding: 60px;
            margin-top: 40px;
        }
        .security-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 48px;
            margin-top: 48px;
        }
        .security-item { text-align: center; }
        .security-item i { font-size: 48px; color: #ffd966; margin-bottom: 20px; }
        .security-item h4 { font-size: 20px; margin-bottom: 12px; }
        .security-item p { font-size: 14px; opacity: 0.85; line-height: 1.6; }

        /* Footer */
        .footer {
            background: #0a1a0a;
            color: #a0b0a0;
            padding: 60px 32px 32px;
        }
        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 60px;
        }
        .footer-logo h3 { font-size: 28px; color: white; margin-bottom: 20px; }
        .footer-logo p { font-size: 13px; line-height: 1.6; }
        .footer-col h4 { color: white; font-size: 16px; margin-bottom: 24px; }
        .footer-col a { display: block; color: #a0b0a0; text-decoration: none; font-size: 13px; margin-bottom: 14px; transition: color 0.2s; }
        .footer-col a:hover { color: #86a788; }
        .copyright { text-align: center; padding-top: 48px; margin-top: 48px; border-top: 1px solid rgba(255,255,255,0.1); font-size: 12px; }

        @media (max-width: 900px) {
            .nav-links, .auth-actions { display: none; }
            .mobile-menu-btn { display: block; }
            .nav-container { padding: 12px 20px; }
            .hero-content { margin-left: 5%; padding: 40px 20px; }
            .hero-content h1 { font-size: 32px; }
            .steps-grid, .security-grid, .footer-content { grid-template-columns: 1fr; }
            .container { padding: 40px 20px; }
            .section-title { font-size: 28px; }
            .banner h2 { font-size: 28px; }
            .banner { padding: 40px 20px; }
        }

        @media (max-width: 480px) {
            .hero-content { margin-left: 0; padding: 30px 20px; }
            .hero-content h1 { font-size: 28px; }
            .hero-content p { font-size: 14px; }
            .hero-btn { padding: 10px 24px; font-size: 14px; }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo">
                <a href="{{ route('home') }}"><h1>Piko</h1></a>
            </div>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
                <a href="{{ route('annonces.index') }}" class="{{ request()->routeIs('annonces.*') ? 'active' : '' }}">Annonces</a>
                @auth
                    <a href="{{ route('mes-annonces') }}" class="{{ request()->routeIs('mes-annonces') ? 'active' : '' }}">Mes annonces</a>
                    <a href="{{ route('favoris.index') }}" class="{{ request()->routeIs('favoris.*') ? 'active' : '' }}">Mes favoris</a>
                @endauth
                <a href="{{ route('about') }}">À propos</a>
                @guest
                    <a href="#comment-ca-marche">Comment ça marche</a>
                @endguest
            </div>
            <div class="auth-actions">
                @auth
                    <div class="user-menu">
                        <div class="user-avatar">
                            <i class="fas fa-user-circle"></i>
                            <span>{{ Auth::user()->prenom }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="user-dropdown">
                            <a href="{{ route('profile.show') }}"><i class="fas fa-user-cog"></i> Mon profil</a>
                            <a href="{{ route('mes-annonces') }}"><i class="fas fa-list"></i> Mes annonces</a>
                            <a href="{{ route('favoris.index') }}"><i class="fas fa-heart"></i> Mes favoris</a>
                            <hr>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-login">Connexion</a>
                    <a href="{{ route('register') }}" class="btn-register">Inscription</a>
                @endauth
            </div>
            <button class="mobile-menu-btn" id="mobileMenuBtn"><i class="fas fa-bars"></i></button>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <div class="mobile-menu-header">
                <div class="logo"><h1>Piko</h1></div>
                <button class="mobile-menu-close" id="mobileMenuClose"><i class="fas fa-times"></i></button>
            </div>
            <div class="mobile-menu-content">
                <a href="{{ route('home') }}" class="mobile-nav-item"><i class="fas fa-home"></i> Accueil</a>
                <a href="{{ route('annonces.index') }}" class="mobile-nav-item"><i class="fas fa-store"></i> Annonces</a>
                @auth
                    <a href="{{ route('mes-annonces') }}" class="mobile-nav-item"><i class="fas fa-list"></i> Mes annonces</a>
                    <a href="{{ route('favoris.index') }}" class="mobile-nav-item"><i class="fas fa-heart"></i> Mes favoris</a>
                @endauth
                <a href="{{ route('about') }}" class="mobile-nav-item"><i class="fas fa-info-circle"></i> À propos</a>
                @guest
                    <a href="#comment-ca-marche" class="mobile-nav-item"><i class="fas fa-question-circle"></i> Comment ça marche</a>
                @endguest
                <hr>
                @auth
                    <a href="{{ route('profile.show') }}" class="mobile-nav-item"><i class="fas fa-user-cog"></i> Mon profil</a>
                    <a href="{{ route('logout') }}" class="mobile-nav-item" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @else
                    <a href="{{ route('login') }}" class="mobile-nav-item"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                    <a href="{{ route('register') }}" class="mobile-nav-item btn-mobile-primary"><i class="fas fa-user-plus"></i> Inscription</a>
                @endauth
            </div>
        </div>
        <div class="mobile-overlay" id="mobileOverlay"></div>
    </header>

    <!-- Hero Section - SEULE L'IMAGE EST FIXE -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1>Échangez <br> des oiseaux <br> en toute confiance</h1>
            <p>Découvrez une communauté passionnée et une marketplace <br>sécurisée dédiée aux passionnés d'oiseaux et aux éleveurs certifiés.</p>
            <a href="{{ route('annonces.create') }}" class="hero-btn">Publier une annonce </a>
        </div>
    </section>

    <!-- Annonces à la une -->
    <div class="container">
        <h2 class="section-title">Annonces à la une</h2>
        <p class="section-subtitle">Les plus beaux spécimens sélectionnés pour vous</p>
        <div class="cards-grid">
            @forelse($annoncesUne ?? [] as $annonce)
                <a href="{{ route('annonces.show', $annonce->id) }}" class="card">
                    <div class="card-img">
                        @if($annonce->getPhotoPrincipale())
                            <img src="{{ asset('storage/' . $annonce->getPhotoPrincipale()->chemin_stockage) }}" alt="{{ $annonce->titre }}">
                        @else
                            <i class="fas fa-dove"></i>
                        @endif
                        @if($annonce->utilisateur && $annonce->utilisateur->estVerifie())
                            <span class="card-badge badge-verified"><i class="fas fa-check-circle"></i> Éleveur Vérifié</span>
                        @endif
                    </div>
                    <div class="card-content">
                        <div class="card-title">{{ $annonce->titre }}</div>
                        <div class="card-price">{{ number_format($annonce->prix, 0, ',', ' ') }}€</div>
                        <div class="card-location"><i class="fas fa-map-marker-alt"></i> {{ $annonce->utilisateur->ville ?? 'Non spécifiée' }}</div>
                        @if($annonce->etat == 'vendue')
                            <span class="card-tag">VENDU</span>
                        @endif
                    </div>
                </a>
            @empty
                <p style="text-align: center;">Aucune annonce à la une pour le moment.</p>
            @endforelse
        </div>
    </div>

    <!-- Banner -->
    <div class="container">
        <div class="banner">
            <h2>Prêt pour un nouveau foyer</h2>
            <p>Plus de 50 oiseaux ont trouvé une famille cette semaine.</p>
            <a href="{{ route('annonces.index') }}" class="btn-register" style="display: inline-block;">Découvrir</a>
        </div>
    </div>

    <!-- Section Comment ça marche (visible uniquement pour non connecté) -->
    @guest
        <div id="comment-ca-marche" class="container">
            <h2 class="section-title">Comment ça marche ?</h2>
            <p class="section-subtitle">PIKO simplifie la vente et l'achat d'oiseaux de compagnie en mettant l'accent sur la sécurité et le bien-être animal.</p>
            <div class="steps-grid">
                <div>
                    <div class="step-icon"><i class="fas fa-search"></i></div>
                    <div class="step-title">Recherchez</div>
                    <div class="step-desc">Filtrez par espèce, âge, prix et localisation pour trouver le compagnon idéal.</div>
                </div>
                <div>
                    <div class="step-icon"><i class="fas fa-comments"></i></div>
                    <div class="step-title">Discutez</div>
                    <div class="step-desc">Communiquez directement avec les vendeurs et éleveurs via notre messagerie sécurisée.</div>
                </div>
                <div>
                    <div class="step-icon"><i class="fas fa-heart"></i></div>
                    <div class="step-title">Adoptez</div>
                    <div class="step-desc">Concluez la transaction en toute confiance grâce à nos guides de sécurité.</div>
                </div>
            </div>
        </div>
    @endguest

    <!-- Security Section -->
    <div class="container">
        <div class="security-section">
            <h2 style="font-size: 32px; text-align: center;">VOTRE SÉCURITÉ EST NOTRE PRIORITÉ</h2>
            <p style="text-align: center; opacity: 0.85; margin-top: 12px;">Engagés pour le bien-être et la transparence</p>
            <div class="security-grid">
                <div class="security-item">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Vérification des Éleveurs</h4>
                    <p>Nous vérifions l'identité et les certifications des éleveurs professionnels.</p>
                </div>
                <div class="security-item">
                    <i class="fas fa-gavel"></i>
                    <h4>Lutte contre le Trafic</h4>
                    <p>Contrôle strict des espèces protégées et respect des conventions CITES.</p>
                </div>
                <div class="security-item">
                    <i class="fas fa-book-medical"></i>
                    <h4>Conseils Santé</h4>
                    <p>Accès à des guides vétérinaires pour préparer l'arrivée de votre oiseau.</p>
                </div>
            </div>
            <div style="text-align: center; margin-top: 40px;">
                <a href="#" style="color: #ffd966; text-decoration: none; font-weight: 600;">Lire notre charte →</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <h3>PIKO</h3>
                <p>La destination n°1 pour les passionnés d'oiseaux en Europe. Nous connectons éleveurs responsables et familles aimantes.</p>
            </div>
            <div class="footer-col">
                <h4>Navigation</h4>
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('annonces.index') }}">Annonces</a>
                <a href="{{ route('about') }}">À propos</a>
            </div>
            <div class="footer-col">
                <h4>Légal</h4>
                <a href="#">Conditions générales</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">Mentions légales</a>
            </div>
            <div class="footer-col">
                <h4>Suivez-nous</h4>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            </div>
        </div>
        <div class="copyright">
            <p>© 2024 PIKO – Marketplace d'annonces aviaires. Conçu pour les passionnés d'oiseaux.</p>
        </div>
    </footer>

    <script>
        const mobileBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileClose = document.getElementById('mobileMenuClose');
        const mobileOverlay = document.getElementById('mobileOverlay');

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        if (mobileBtn) mobileBtn.addEventListener('click', openMobileMenu);
        if (mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
        if (mobileOverlay) mobileOverlay.addEventListener('click', closeMobileMenu);

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                    closeMobileMenu();
                }
            });
        });
    </script>
</body>
</html>