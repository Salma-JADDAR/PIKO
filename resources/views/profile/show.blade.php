<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Mon profil</title>
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
            background: linear-gradient(135deg, #e8f0e6 0%, #d4e4d0 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        *::-webkit-scrollbar {
            display: none;
        }
        {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
            margin: -20px -20px 20px -20px;
            padding: 0 20px;
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
            color: #475569;
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
            color: #475569;
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

        /* Profile Container - Split Screen (Formulaire à gauche, Image à droite) */
        .profile-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            background: white;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
        }

        /* Form Side (Left) */
        .form-side {
            flex: 1;
            width: 60%;
            padding: 40px 40px;
            background: white;
            order: 1;
        }

        /* Sidebar (Right) - Image de fond */
        .profile-sidebar {
            flex: 1;
            width: 40%;
            position: relative;
            background-image: url("{{ asset('images/login.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 600px;
            order: 2;
        }

        .profile-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(145deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.75) 100%);
        }

        .sidebar-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 50px 35px;
            max-width: 100%;
            margin: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .featured-badge {
            display: inline-block;
            font-size: 11px;
            letter-spacing: 3px;
            font-weight: 700;
            color: #ffd966;
            margin-bottom: 20px;
            text-transform: uppercase;
            background: rgba(0, 0, 0, 0.3);
            padding: 6px 16px;
            border-radius: 30px;
            backdrop-filter: blur(4px);
        }

        .sidebar-content h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            color: white;
            letter-spacing: -0.5px;
        }

        .avatar-large {
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(8px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            border: 3px solid rgba(255,255,255,0.3);
        }
        .avatar-large i {
            font-size: 60px;
            color: white;
        }

        .profile-name-large h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .profile-name-large p {
            font-size: 13px;
            opacity: 0.8;
        }

        .profile-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(8px);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 16px;
        }

        .info-list {
            margin-top: 30px;
            text-align: left;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
            border-radius: 20px;
            padding: 20px;
        }
        .info-list-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }
        .info-list-item:last-child {
            border-bottom: none;
        }
        .info-list-item i {
            width: 32px;
            color: #ffd966;
        }
        .info-list-item .label {
            font-size: 11px;
            opacity: 0.7;
            text-transform: uppercase;
        }
        .info-list-item .value {
            font-size: 14px;
            font-weight: 600;
        }

        .logo-form {
            text-align: center;
            margin-bottom: 36px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e8ecef;
        }
        .logo-form h1 {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
            display: inline-block;
            position: relative;
        }
        .logo-form h1::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 3px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            border-radius: 2px;
        }
        .logo-form span {
            display: block;
            font-size: 10px;
            font-weight: 600;
            color: #86a788;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 12px;
        }

        .form-header h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .form-header p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 32px;
            text-align: center;
        }

        /* Tabs */
        .tabs {
            display: flex;
            border-bottom: 1px solid #eef2f0;
            margin-bottom: 32px;
            gap: 8px;
            justify-content: center;
        }
        .tab-btn {
            padding: 12px 24px;
            background: none;
            border: none;
            font-size: 14px;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
            transition: all 0.3s;
            border-radius: 40px;
        }
        .tab-btn.active {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
        }
        .tab-btn:hover:not(.active) {
            background: #e8f0e6;
            color: #2d6a4f;
        }
        .tab-content {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        .tab-content.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Form Styles */
        .row-group {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .row-group .form-group {
            flex: 1;
            margin-bottom: 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }
        .input-wrapper {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 16px;
        }
        .form-group input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
            background: #fafbfc;
        }
        .form-group input:focus {
            outline: none;
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
            background: white;
        }
        .password-input {
            position: relative;
        }
        .password-input input {
            padding-right: 42px;
        }
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9ca3af;
            font-size: 16px;
            transition: color 0.2s;
        }
        .toggle-password:hover {
            color: #2d6a4f;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.3);
        }

        .error-text {
            color: #dc2626;
            font-size: 11px;
            margin-top: 5px;
            display: block;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-card {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            border: 1px solid #eef2f0;
            transition: all 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: #2d6a4f;
        }
        .stat-label {
            font-size: 12px;
            color: #64748b;
            margin-top: 6px;
        }

        .info-box {
            background: #f8fafc;
            border-radius: 16px;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid #eef2f0;
        }
        .info-box h4 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #0f172a;
        }
        .info-box p {
            font-size: 13px;
            color: #64748b;
            line-height: 1.5;
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

        /* Footer - IDENTIQUE À LA PAGE HOME */
        .footer {
            background: #0a1a0a;
            color: #a0b0a0;
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
            color: #a0b0a0;
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
            .profile-container { flex-direction: column; max-width: 550px; }
            .form-side { width: 100%; order: 1; padding: 32px 28px; }
            .profile-sidebar { width: 100%; order: 2; min-height: 450px; }
            .sidebar-content { top: auto; transform: none; padding: 40px 30px; }
            .footer-content { grid-template-columns: 1fr; gap: 40px; }
        }

        @media (max-width: 600px) {
            .form-side { padding: 24px 20px; }
            .form-header h2 { font-size: 24px; }
            .profile-sidebar { min-height: 400px; }
            .sidebar-content h2 { font-size: 28px; }
            .row-group { flex-direction: column; gap: 20px; }
            .stats-grid { grid-template-columns: 1fr; }
            .tabs { flex-wrap: wrap; justify-content: center; }
            .tab-btn { padding: 8px 16px; font-size: 13px; }
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
</div>    <div class="user-avatar">
                            <i class="fas fa-user-circle"></i>
                            <span>{{ Auth::user()->prenom }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="user-dropdown">
                            <a href="{{ route('profile.show') }}" class="active"><i class="fas fa-user-cog"></i> Mon profil</a>
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

    <!-- Profile Container - Split Screen (Formulaire à gauche, Image à droite) -->
    <div class="profile-container">
        <!-- Form Side (Left) -->
        <div class="form-side">
            <div class="logo-form">
                <h1>Piko</h1>
                <span>MON ESPACE PERSONNEL</span>
            </div>

            <div class="form-header">
                <h2>Gérer mon profil</h2>
                <p>Modifiez vos informations personnelles et sécurisez votre compte</p>
            </div>

            <div class="tabs">
                <button class="tab-btn active" data-tab="profile">Informations</button>
                <button class="tab-btn" data-tab="password">Sécurité</button>
                <button class="tab-btn" data-tab="stats">Statistiques</button>
            </div>

            <!-- Tab 1: Informations personnelles -->
            <div class="tab-content active" id="tab-profile">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row-group">
                        <div class="form-group">
                            <label>Prénom</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}" required>
                            </div>
                            @error('prenom') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Nom</label>
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="nom" value="{{ old('nom', $user->nom) }}" required>
                            </div>
                            @error('nom') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                        @error('email') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="row-group">
                        <div class="form-group">
                            <label>Téléphone</label>
                            <div class="input-wrapper">
                                <i class="fas fa-phone input-icon"></i>
                                <input type="tel" name="telephone" value="{{ old('telephone', $user->telephone) }}" placeholder="Optionnel">
                            </div>
                            @error('telephone') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Ville</label>
                            <div class="input-wrapper">
                                <i class="fas fa-map-marker-alt input-icon"></i>
                                <input type="text" name="ville" value="{{ old('ville', $user->ville) }}" placeholder="Optionnel">
                            </div>
                            @error('ville') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Enregistrer les modifications
                    </button>
                </form>
            </div>

            <!-- Tab 2: Sécurité -->
            <div class="tab-content" id="tab-password">
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Mot de passe actuel</label>
                        <div class="password-input">
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="current_password" required>
                            </div>
                            <i class="fas fa-eye-slash toggle-password"></i>
                        </div>
                        @error('current_password') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="row-group">
                        <div class="form-group">
                            <label>Nouveau mot de passe</label>
                            <div class="password-input">
                                <div class="input-wrapper">
                                    <i class="fas fa-key input-icon"></i>
                                    <input type="password" name="password" required>
                                </div>
                                <i class="fas fa-eye-slash toggle-password"></i>
                            </div>
                            @error('password') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirmer le mot de passe</label>
                            <div class="password-input">
                                <div class="input-wrapper">
                                    <i class="fas fa-check-circle input-icon"></i>
                                    <input type="password" name="password_confirmation" required>
                                </div>
                                <i class="fas fa-eye-slash toggle-password"></i>
                            </div>
                        </div>
                    </div>

                    <small style="font-size: 11px; color: #9ca3af; display: block; margin-bottom: 20px;">
                        <i class="fas fa-info-circle"></i> Le mot de passe doit contenir au moins 8 caractères.
                    </small>

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-shield-alt"></i> Changer le mot de passe
                    </button>
                </form>
            </div>

            <!-- Tab 3: Statistiques -->
            <div class="tab-content" id="tab-stats">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">{{ $totalAnnonces ?? 0 }}</div>
                        <div class="stat-label">Annonces publiées</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $totalFavoris ?? 0 }}</div>
                        <div class="stat-label">Favoris reçus</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $totalVues ?? 0 }}</div>
                        <div class="stat-label">Vues totales</div>
                    </div>
                </div>
                
                <div class="info-box">
                    <h4><i class="fas fa-lightbulb"></i> À propos de vous</h4>
                    <p>Complétez votre profil pour augmenter la confiance des acheteurs. Les utilisateurs avec un profil complet reçoivent jusqu'à 40% de messages en plus.</p>
                </div>
            </div>
        </div>

        <!-- Sidebar (Right) - Image de fond -->
        <div class="profile-sidebar">
            <div class="sidebar-content">
                <div class="featured-badge">
                    <i class="fas fa-user-circle"></i> MON PROFIL
                </div>
                <div class="avatar-large">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="profile-name-large">
                    <h3>{{ $user->prenom }} {{ $user->nom }}</h3>
                    <p>{{ $user->email }}</p>
                </div>
                @if($user->role === 'admin')
                    <span class="profile-badge"><i class="fas fa-shield-alt"></i> Administrateur</span>
                @elseif($user->role === 'verifie')
                    <span class="profile-badge"><i class="fas fa-check-circle"></i> Compte vérifié</span>
                @endif

                <div class="info-list">
                    <div class="info-list-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <div class="label">LOCALISATION</div>
                            <div class="value">{{ $user->ville ?? 'Non renseignée' }}</div>
                        </div>
                    </div>
                    <div class="info-list-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <div class="label">TÉLÉPHONE</div>
                            <div class="value">{{ $user->telephone ?? 'Non renseigné' }}</div>
                        </div>
                    </div>
                    <div class="info-list-item">
                        <i class="fas fa-calendar-alt"></i>
                        <div>
                            <div class="label">MEMBRE DEPUIS</div>
                            <div class="value">{{ $user->created_at->format('F Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer - IDENTIQUE À LA PAGE HOME -->
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

        // Tabs
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const tabId = btn.getAttribute('data-tab');
                
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                btn.classList.add('active');
                document.getElementById(`tab-${tabId}`).classList.add('active');
            });
        });

        // Toggle password visibility
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>