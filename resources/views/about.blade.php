<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · À propos - La référence aviaire en Europe</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #0f172a;
            scroll-behavior: smooth;
        }

        *::-webkit-scrollbar {
            display: none;
        }
        {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Header Premium */
        .header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
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
            color: #475569;
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
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.2);
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.35);
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

        /* Hero Section - IDENTIQUE À LA PAGE D'ACCUEIL (sans barre de recherche) */
        .hero {
            position: relative;
            min-height: 80vh;
            display: flex;
            align-items: center;
            overflow: visible;
        }
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset("images/apa.PNG") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            z-index: 0;
        }
        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.7) 100%);
        }
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            padding: 80px 32px 60px 32px;
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

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 80px 32px;
        }

        /* Style centré pour tous les titres de sections */
        .section-header-center {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title-center {
            font-size: 42px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 20px;
            letter-spacing: -1px;
            position: relative;
            display: inline-block;
        }

        .section-title-center::after {
            content: '';
            position: absolute;
            bottom: -16px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 4px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border-radius: 4px;
        }

        .section-subtitle-center {
            color: #64748b;
            font-size: 18px;
            margin-top: 24px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Stats Section Premium - Cartes avec images de fond */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            text-align: center;
        }
        .stat-card {
            position: relative;
            padding: 40px 24px;
            border-radius: 28px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            color: white;
            min-height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.6), rgba(0,0,0,0.8));
            z-index: 1;
            border-radius: 28px;
        }
        .stat-card:hover {
            transform: translateY(-8px);
        }
        .stat-card > * {
            position: relative;
            z-index: 2;
        }
        .stat-number {
            font-size: 52px;
            font-weight: 800;
            color: #ffd966;
            margin-bottom: 12px;
        }
        .stat-label {
            font-size: 15px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255,255,255,0.9);
        }

        /* Valeurs Section - Cartes avec images de fond */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 20px;
        }
        .value-card {
            position: relative;
            border-radius: 28px;
            padding: 40px 28px;
            text-align: center;
            transition: all 0.4s ease;
            overflow: hidden;
            color: white;
            min-height: 320px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.5), rgba(0,0,0,0.75));
            z-index: 1;
            border-radius: 28px;
        }
        .value-card:hover {
            transform: translateY(-8px);
        }
        .value-card > * {
            position: relative;
            z-index: 2;
        }
        .value-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 40px;
            color: #ffd966;
        }
        .value-card h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .value-card p {
            color: rgba(255,255,255,0.85);
            line-height: 1.6;
        }

        /* Témoignages Section */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 20px;
        }
        .testimonial-card {
            background: white;
            border-radius: 28px;
            padding: 32px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            position: relative;
        }
        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.12);
        }
        .testimonial-quote {
            font-size: 48px;
            color: #2d6a4f;
            opacity: 0.2;
            position: absolute;
            top: 20px;
            right: 24px;
            font-family: Georgia, serif;
        }
        .testimonial-text {
            font-size: 15px;
            line-height: 1.7;
            color: #475569;
            margin-bottom: 24px;
            font-style: italic;
            min-height: 100px;
        }
        .testimonial-user {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #eef2f0;
        }
        .testimonial-avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e8f0e6;
        }
        .testimonial-info h4 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .testimonial-info p {
            font-size: 12px;
            color: #64748b;
        }
        .testimonial-rating {
            color: #fbbf24;
            font-size: 12px;
            margin-top: 4px;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }
        .team-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            text-align: center;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.12);
        }
        .team-image {
            height: 250px;
            overflow: hidden;
        }
        .team-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .team-card h4 {
            font-size: 20px;
            font-weight: 700;
            margin-top: 20px;
        }
        .team-card p {
            color: #64748b;
            font-size: 13px;
            margin: 8px 0 20px;
        }
        .team-social {
            display: flex;
            justify-content: center;
            gap: 16px;
            padding-bottom: 24px;
        }
        .team-social a {
            width: 36px;
            height: 36px;
            background: #e8f0e6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2d6a4f;
            transition: all 0.3s;
        }
        .team-social a:hover {
            background: #2d6a4f;
            color: white;
            transform: translateY(-3px);
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border-radius: 48px;
            text-align: center;
            padding: 70px 60px;
            margin: 40px 32px;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            border-radius: 50%;
        }
        .cta-section h3 {
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 20px;
            color: white;
            position: relative;
        }
        .cta-section p {
            font-size: 18px;
            color: rgba(255,255,255,0.85);
            margin-bottom: 32px;
            position: relative;
        }
        .cta-section .btn-register {
            display: inline-block;
            background: white;
            color: #2d6a4f;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            padding: 14px 32px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
        }
        .cta-section .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        }

        /* Footer Premium */
        .footer {
            background: #0a1a0a;
            color: #94a3b8;
            padding: 60px 32px 32px;
        }
        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 60px;
        }
        .footer-logo h3 {
            font-size: 28px;
            color: white;
            margin-bottom: 20px;
        }
        .footer-logo p {
            font-size: 13px;
            line-height: 1.6;
        }
        .footer-col h4 {
            color: white;
            font-size: 16px;
            margin-bottom: 24px;
        }
        .footer-col a {
            display: block;
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 14px;
            transition: color 0.2s;
        }
        .footer-col a:hover {
            color: #86a788;
        }
        .copyright {
            text-align: center;
            padding-top: 48px;
            margin-top: 48px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .nav-links, .auth-actions { display: none; }
            .mobile-menu-btn { display: block; }
            .nav-container { padding: 12px 20px; }
            .hero-content { margin-left: 5%; padding: 60px 20px 40px 20px; }
            .hero-content h1 { font-size: 32px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .values-grid { grid-template-columns: 1fr; }
            .testimonials-grid { grid-template-columns: 1fr; }
            .team-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-content { grid-template-columns: 1fr; gap: 40px; }
            .container { padding: 50px 20px; }
            .section-title-center { font-size: 32px; }
            .cta-section { margin: 20px; padding: 50px 30px; }
            .cta-section h3 { font-size: 28px; }
        }

        @media (max-width: 600px) {
            .stats-grid { grid-template-columns: 1fr; }
            .team-grid { grid-template-columns: 1fr; }
            .hero-content h1 { font-size: 28px; }
            .hero-content p { font-size: 14px; }
            .section-title-center { font-size: 28px; }
            .section-subtitle-center { font-size: 14px; }
            .testimonial-text { min-height: auto; }
        }

        @media (max-width: 480px) {
            .hero-content { margin-left: 0; padding: 50px 20px 30px 20px; }
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
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('annonces.index') }}">Annonces</a>
                @auth
                    <a href="{{ route('mes-annonces') }}">Mes annonces</a>
                    <a href="{{ route('favoris.index') }}">Mes favoris</a>
                @endauth
                <a href="{{ route('about') }}" class="active">À propos</a>
            </div>
            <div class="auth-actions">
                @auth
                    <div class="user-menu">
                     <div class="user-avatar">
    <i class="fas fa-user-circle"></i>
    <span>{{ Auth::user()->prenom }}</span>
    @if(Auth::user()->role === 'verifie')
        <span class="verified-badge-header" style="background: #2d6a4f; color: white; padding: 2px 8px; border-radius: 20px; font-size: 10px; margin-left: 5px;">
            <i class="fas fa-check-circle"></i> Vérifié
        </span>
    @endif
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

    <!-- Hero Section - IDENTIQUE À LA PAGE D'ACCUEIL (sans barre de recherche) -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1>À propos <br> de Piko</h1>
            <p>Nous sommes une communauté dédiée aux passionnés d'oiseaux, engagée pour le bien-être animal et l'adoption responsable.</p>
        </div>
    </section>

    <!-- Stats Section - Cartes avec images de fond -->
    <div class="container" style="padding-top: 14px;">
        <div class="section-header-center">
            <h2 class="section-title-center">Notre impact</h2>
            <p class="section-subtitle-center">Une communauté qui grandit chaque jour</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card" style="background-image: url('{{ asset("images/i1.PNG") }}'); background-size: cover; background-position: center;">
                <div class="stat-number">1500+</div>
                <div class="stat-label">Annonces publiées</div>
            </div>
            <div class="stat-card" style="background-image: url('{{ asset("images/i2.PNG") }}'); background-size: cover; background-position: center;">
                <div class="stat-number">500+</div>
                <div class="stat-label">Éleveurs vérifiés</div>
            </div>
            <div class="stat-card" style="background-image: url('{{ asset("images/i4.PNG") }}'); background-size: cover; background-position: center;">
                <div class="stat-number">50+</div>
                <div class="stat-label">Espèces disponibles</div>
            </div>
            <div class="stat-card" style="background-image: url('{{ asset("images/i3.PNG") }}'); background-size: cover; background-position: center;">
                <div class="stat-number">98%</div>
                <div class="stat-label">Satisfaction client</div>
            </div>
        </div>
    </div>

    <!-- Valeurs Section - Cartes avec images de fond -->
    <div class="container" style="padding-top: 14px;">
        <div class="section-header-center">
            <h2 class="section-title-center">Nos valeurs</h2>
            <p class="section-subtitle-center">Ce qui nous guide au quotidien</p>
        </div>
        <div class="values-grid">
            <div class="value-card" style="background-image: url('{{ asset("images/bien.PNG") }}'); background-size: cover; background-position: center;">
                <div class="value-icon"><i class="fas fa-heart"></i></div>
                <h3>Bien-être animal</h3>
                <p>La santé et le bonheur des oiseaux sont au cœur de toutes nos actions.</p>
            </div>
            <div class="value-card" style="background-image: url('{{ asset("images/trans.PNG") }}'); background-size: cover; background-position: center;">
                <div class="value-icon"><i class="fas fa-shield-alt"></i></div>
                <h3>Transparence</h3>
                <p>Des transactions claires et sécurisées pour une confiance totale.</p>
            </div>
            <div class="value-card" style="background-image: url('{{ asset("images/comm.PNG") }}'); background-size: cover; background-position: center;">
                <div class="value-icon"><i class="fas fa-users"></i></div>
                <h3>Communauté</h3>
                <p>Une famille de passionnés qui partagent les mêmes valeurs.</p>
            </div>
        </div>
    </div>

    <!-- Témoignages Section -->
    <div class="container" style="padding-top: 14px;">
        <div class="section-header-center">
            <h2 class="section-title-center">Ils nous font confiance</h2>
            <p class="section-subtitle-center">Ce que nos utilisateurs pensent de Piko</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">"Grâce à Piko, j'ai trouvé un magnifique perroquet gris du Gabon. Le processus était simple et sécurisé. Je recommande vivement cette plateforme à tous les passionnés d'oiseaux !"</p>
                <div class="testimonial-user">
                    <img src="{{ asset('images/so.PNG') }}" alt="Sophie" class="testimonial-avatar">
                    <div class="testimonial-info">
                        <h4>Sophie Martinez</h4>
                        <p>Paris, France</p>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">"Éleveur professionnel depuis 10 ans, Piko m'a permis de développer ma clientèle et de trouver des familles aimantes pour mes oiseaux. Une plateforme de confiance !"</p>
                <div class="testimonial-user">
                    <img src="{{ asset('images/d.PNG') }}" alt="David" class="testimonial-avatar">
                    <div class="testimonial-info">
                        <h4>David Rousseau</h4>
                        <p>Lyon, France</p>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-quote">"</div>
                <p class="testimonial-text">"J'ai adopté deux inséparables via Piko. L'équipe est très réactive et les éleveurs sont sérieux. Une belle découverte qui m'a permis d'agrandir ma famille."</p>
                <div class="testimonial-user">
                    <img src="{{ asset('images/ju.PNG') }}" alt="Julie" class="testimonial-avatar">
                    <div class="testimonial-info">
                        <h4>Julie Lambert</h4>
                        <p>Bordeaux, France</p>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="container" style="padding-top: 14px;">
        <div class="section-header-center">
            <h2 class="section-title-center">Notre équipe</h2>
            <p class="section-subtitle-center">Des passionnés à votre service</p>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-image">
                    <img src="{{ asset('images/sph.PNG') }}" alt="Fondatrice">
                </div>
                <h4>Sophie Martin</h4>
                <p>Fondatrice & CEO</p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="team-card">
                <div class="team-image">
                    <img src="{{ asset('images/th.PNG') }}" alt="Directeur">
                </div>
                <h4>Thomas Bernard</h4>
                <p>Directeur des opérations</p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="team-card">
                <div class="team-image">
                    <img src="{{ asset('images/m.PNG') }}" alt="Responsable">
                </div>
                <h4>Marie Dubois</h4>
                <p>Responsable bien-être animal</p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="team-card">
                <div class="team-image">
                    <img src="{{ asset('images/l.PNG') }}" alt="Technique">
                </div>
                <h4>Lucas Petit</h4>
                <p>Lead développeur</p>
                <div class="team-social">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                </div>
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
    </script>
</body>
</html>