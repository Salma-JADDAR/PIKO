<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Mes favoris</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #f0f2f5 100%);
            color: #1a1a1a;
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
            color: #4a5568;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s ease;
            position: relative;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            transition: width 0.3s ease;
        }
        .nav-links a:hover::after,
        .nav-links a.active::after {
            width: 100%;
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
            box-shadow: 0 4px 12px rgba(45,106,79,0.2);
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45,106,79,0.35);
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

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 72vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("{{ asset('images/Ca.PNG') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
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
            padding: 60px 32px 40px 32px;
            color: white;
            text-align: left;
            margin-left: 2%;
        }
        .hero-content h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 16px;
            letter-spacing: -1px;
            line-height: 1.2;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }
        .hero-content p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 24px;
            opacity: 0.95;
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.3);
        }

        /* Stats Dashboard avec images de fond */
        .stats-dashboard {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            max-width: 1280px;
            margin: -50px auto 0;
            padding: 0 32px;
            position: relative;
            z-index: 10;
        }
        .stat-card {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 24px;
            padding: 28px 24px;
            display: flex;
            align-items: center;
            gap: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.15);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 40px rgba(0,0,0,0.2);
        }
        .stat-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.8) 100%);
            z-index: 1;
        }
        .stat-icon {
            position: relative;
            z-index: 2;
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(8px);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .stat-icon i {
            font-size: 28px;
            color: #ffd966;
        }
        .stat-info {
            position: relative;
            z-index: 2;
        }
        .stat-info h3 {
            font-size: 32px;
            font-weight: 800;
            color: white;
            line-height: 1.2;
        }
        .stat-info p {
            font-size: 13px;
            color: rgba(255,255,255,0.85);
            font-weight: 500;
        }

        /* Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 60px 32px;
        }

        /* Section Header */
        .section-header-center {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-title-center {
            font-size: 36px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 16px;
            letter-spacing: -1px;
            position: relative;
            display: inline-block;
            background: linear-gradient(135deg, #0f172a, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .section-title-center::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border-radius: 4px;
        }

        .section-subtitle-center {
            color: #6c757d;
            font-size: 16px;
            margin-top: 20px;
        }

        /* Favoris Grid Premium */
        .favoris-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            margin-bottom: 48px;
        }
        
        .favoris-card {
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            text-decoration: none;
            color: inherit;
            display: block;
            min-height: 320px;
            cursor: pointer;
        }
        .favoris-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
        }
        
        .favoris-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.8));
            z-index: 1;
            border-radius: 24px;
        }
        
        .remove-favorite {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 10;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .remove-favorite i {
            font-size: 18px;
            color: #ff4757;
            transition: all 0.3s;
        }
        .remove-favorite:hover {
            transform: scale(1.1);
            background: #ff4757;
        }
        .remove-favorite:hover i {
            color: white;
        }
        
        .card-content {
            position: relative;
            z-index: 5;
            padding: 24px;
            min-height: 320px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            color: white;
        }
        .card-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            color: white;
            line-height: 1.3;
        }
        .card-price {
            font-size: 26px;
            font-weight: 800;
            color: #ffd966;
            margin-bottom: 10px;
        }
        .card-location {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.85);
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 4px;
        }
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            padding-top: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }
        .card-views {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.75);
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .card-date {
            font-size: 11px;
            color: #ffd966;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Empty State Premium */
        .empty-state {
            text-align: center;
            padding: 80px 40px;
            background: white;
            border-radius: 32px;
            border: 1px solid #eef2f0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        }
        .empty-icon {
            font-size: 80px;
            color: #c8dcc4;
            margin-bottom: 24px;
        }
        .empty-state h3 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #0f172a, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .empty-state p {
            color: #6c757d;
            margin-bottom: 32px;
        }
        .btn-primary {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(45,106,79,0.2);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45,106,79,0.35);
        }

        /* Pagination Premium */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 40px;
        }
        .page-link {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: white;
            color: #4a5568;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: 1px solid #eef2f0;
        }
        .page-link:hover, .page-link.active {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
        }

        /* Alert Messages */
        .alert {
            position: fixed;
            bottom: 30px;
            right: 30px;
            padding: 14px 28px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            z-index: 2000;
            animation: slideIn 0.4s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
        }
        .alert-danger {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
        }
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Footer */
        .footer {
            background: #0a1a0a;
            color: #94a3b8;
            padding: 60px 32px 32px;
            margin-top: 60px;
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
            .stats-dashboard { grid-template-columns: repeat(2, 1fr); margin-top: -30px; padding: 0 20px; }
            .favoris-grid { grid-template-columns: repeat(2, 1fr); }
            .container { padding: 40px 20px; }
            .section-title-center { font-size: 28px; }
            .footer-content { grid-template-columns: 1fr; gap: 40px; }
            .hero-content { margin-left: 5%; padding: 50px 20px 30px 20px; }
            .hero-content h1 { font-size: 32px; }
        }

        @media (max-width: 600px) {
            .stats-dashboard { grid-template-columns: 1fr; }
            .favoris-grid { grid-template-columns: 1fr; }
            .card-content { padding: 20px; }
            .card-title { font-size: 18px; }
            .card-price { font-size: 22px; }
            .hero-content h1 { font-size: 28px; }
            .hero-content p { font-size: 14px; }
            .hero-content { margin-left: 0; padding: 40px 20px 25px 20px; }
            .section-title-center { font-size: 24px; }
            .section-subtitle-center { font-size: 14px; }
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
                    <a href="{{ route('favoris.index') }}" class="active">Mes favoris</a>
                @endauth
                <a href="{{ route('about') }}">À propos</a>
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

    @if(session('success'))
        <div class="alert alert-success" id="alertMessage">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" id="alertMessage">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1>Mes favoris</h1>
            <p>Retrouvez ici toutes les annonces que vous avez aimées et sauvegardées.</p>
        </div>
    </section>

    <!-- Stats Dashboard avec images de fond -->
    <div class="stats-dashboard">
        <div class="stat-card" style="background-image: url('{{ asset('images/favoris.PNG') }}'); background-size: cover; background-position: center;">
            <div class="stat-overlay"></div>
            <div class="stat-icon">
                <i class="fas fa-heart"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $favoris->total() }}</h3>
                <p>Favoris</p>
            </div>
        </div>
        <div class="stat-card" style="background-image: url('{{ asset('images/vues.PNG') }}'); background-size: cover; background-position: center;">
            <div class="stat-overlay"></div>
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $totalVues ?? $favoris->sum(function($f) { return $f->annonce->nb_vues ?? 0; }) }}</h3>
                <p>Vues totales</p>
            </div>
        </div>
        <div class="stat-card" style="background-image: url('{{ asset('images/prix.PNG') }}'); background-size: cover; background-position: center;">
            <div class="stat-overlay"></div>
            <div class="stat-icon">
                <i class="fas fa-euro-sign"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $prixMoyen ?? number_format($favoris->avg(function($f) { return $f->annonce->prix ?? 0; }), 0) }}€</h3>
                <p>Prix moyen</p>
            </div>
        </div>
        <div class="stat-card" style="background-image: url('{{ asset('images/heart.PNG') }}'); background-size: cover; background-position: center;">
            <div class="stat-overlay"></div>
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $favoris->first() ? $favoris->first()->date_ajout->format('d/m/Y') : '-' }}</h3>
                <p>Dernier ajout</p>
            </div>
        </div>
    </div>

    <div class="container">
     
@if($favoris->count() > 0)
    <div class="favoris-grid">
        @foreach($favoris as $favori)
            @php
                $annonce = $favori->annonce;
                $photo = $annonce->photos->where('est_principale', true)->first();
                // Correction importante pour l'image
                $imagePath = $photo ? $photo->chemin_stockage : null;
                $imageUrl = $imagePath ? asset('storage/' . str_replace('storage/', '', $imagePath)) : asset('images/default.jpg');
            @endphp
            <div class="favoris-card" style="background-image: url('{{ $imageUrl }}');">
                <button class="remove-favorite" onclick="removeFavorite(event, {{ $favori->id }})">
                    <i class="fas fa-heart"></i>
                </button>
                <a href="{{ route('annonces.show', $annonce->id) }}" class="card-content-link">
                    <div class="card-content">
                        <h3 class="card-title">{{ $annonce->titre }}</h3>
                        <div class="card-price">{{ number_format($annonce->prix, 0, ',', ' ') }}€</div>
                        <div class="card-location">
                            <i class="fas fa-map-marker-alt"></i> {{ $annonce->utilisateur->ville ?? 'France' }}
                        </div>
                        <div class="card-footer">
                            <span class="card-views"><i class="fas fa-eye"></i> {{ $annonce->nb_vues ?? 0 }} vues</span>
                            <span class="card-date"><i class="fas fa-calendar-plus"></i> {{ $favori->date_ajout->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $favoris->links() }}
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">
            <i class="far fa-heart"></i>
        </div>
        <h3>Aucun favori</h3>
        <p>Vous n'avez pas encore d'annonces dans vos favoris.</p>
        <a href="{{ route('annonces.index') }}" class="btn-primary">Découvrir des annonces</a>
    </div>
@endif
    </div>

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
        // Mobile menu
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

        // Auto-hide alert
        setTimeout(function() {
            const alert = document.getElementById('alertMessage');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(function() {
                    if(alert) alert.remove();
                }, 300);
            }
        }, 4000);

        // Remove favorite function
       // Remove favorite function - Version qui gère la redirection
function removeFavorite(event, favoriId) {
    event.preventDefault();
    event.stopPropagation();
    
    if (confirm('Voulez-vous vraiment retirer cette annonce de vos favoris ?')) {
        // Créer un formulaire pour envoyer la requête DELETE
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/favoris/' + favoriId;
        form.style.display = 'none';
        
        // Ajouter le token CSRF
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);
        
        // Ajouter la méthode DELETE
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(methodInput);
        
        document.body.appendChild(form);
        form.submit();
    }
}
    </script>
</body>
</html>