<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · À propos</title>
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
        .logo a { text-decoration: none; }
        .logo h1 {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
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
        .nav-links a:hover, .nav-links a.active { color: #2d6a4f; }
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
        .btn-login:hover { background: #2d6a4f; color: white; transform: translateY(-2px); }
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
        .btn-register:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(45, 106, 79, 0.3); }

        /* User Menu */
        .user-menu { position: relative; cursor: pointer; }
        .user-avatar {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: #e8f0e6;
            border-radius: 40px;
            transition: all 0.3s;
        }
        .user-avatar i { color: #2d6a4f; }
        .user-avatar span { font-size: 14px; font-weight: 500; color: #2d6a4f; }
        .user-menu:hover .user-avatar { background: #d4e4d0; }
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
            transition: all 0.3s;
            z-index: 100;
        }
        .user-menu:hover .user-dropdown { opacity: 1; visibility: visible; transform: translateY(0); }
        .user-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            text-decoration: none;
            color: #4a5568;
            font-size: 13px;
            transition: background 0.2s;
        }
        .user-dropdown a:hover { background: #e8f0e6; color: #2d6a4f; }
        .user-dropdown hr { margin: 8px 0; border-top: 1px solid #eef2f0; }

        /* Mobile */
        .mobile-menu-btn { display: none; background: none; border: none; font-size: 24px; color: #2d6a4f; cursor: pointer; }
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 350px;
            height: 100%;
            background: white;
            box-shadow: -5px 0 30px rgba(0,0,0,0.1);
            z-index: 1001;
            transition: right 0.3s;
            overflow-y: auto;
        }
        .mobile-menu.active { right: 0; }
        .mobile-menu-header { display: flex; justify-content: space-between; align-items: center; padding: 20px; border-bottom: 1px solid #eef2f0; }
        .mobile-menu-header .logo h1 { font-size: 24px; }
        .mobile-menu-close { background: none; border: none; font-size: 24px; color: #2d6a4f; cursor: pointer; }
        .mobile-menu-content { padding: 20px; display: flex; flex-direction: column; gap: 12px; }
        .mobile-nav-item { display: flex; align-items: center; gap: 12px; padding: 12px 16px; text-decoration: none; color: #4a5568; border-radius: 12px; transition: background 0.2s; }
        .mobile-nav-item:hover { background: #e8f0e6; color: #2d6a4f; }
        .mobile-nav-item i { width: 24px; color: #86a788; }
        .btn-mobile-primary { background: linear-gradient(135deg, #1e4620, #2d6a4f); color: white !important; justify-content: center; }
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

        @media (max-width: 900px) {
            .nav-links, .auth-actions { display: none; }
            .mobile-menu-btn { display: block; }
            .nav-container { padding: 12px 20px; }
        }

        /* Hero Section avec image */
        .hero-about {
            background: linear-gradient(135deg, #e8f0e6 0%, #d4e4d0 100%);
            padding: 80px 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero-about::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1444464666168-49d633b86797?w=1920&h=500&fit=crop') center/cover;
            opacity: 0.15;
            pointer-events: none;
        }
        .hero-about h1 {
            font-size: 56px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 20px;
            letter-spacing: -1px;
            position: relative;
        }
        .hero-about p {
            font-size: 18px;
            color: #4a5b4d;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
            position: relative;
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 60px 32px;
            margin-top: -40px;
            position: relative;
            z-index: 2;
        }
        .stats-grid {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            text-align: center;
        }
        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .stat-card:hover { transform: translateY(-5px); }
        .stat-number {
            font-size: 42px;
            font-weight: 800;
            color: #2d6a4f;
            margin-bottom: 8px;
        }
        .stat-label {
            font-size: 14px;
            color: #6c757d;
            font-weight: 500;
        }

        /* Mission Section avec image */
        .mission-section {
            background: #1a2e1a;
            color: white;
            padding: 80px 32px;
            position: relative;
            overflow: hidden;
        }
        .mission-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1552728089-57bdde30beb3?w=1920&h=600&fit=crop') center/cover;
            opacity: 0.1;
            pointer-events: none;
        }
        .mission-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
            text-align: center;
        }
        .mission-content h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .mission-content p {
            font-size: 16px;
            line-height: 1.7;
            opacity: 0.9;
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
            text-align: center;
            letter-spacing: -0.5px;
        }
        .section-subtitle {
            color: #6c757d;
            margin-bottom: 48px;
            font-size: 16px;
            text-align: center;
        }

        /* Conseils Grid avec images */
        .tips-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
        }
        .tip-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        .tip-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .tip-image {
            height: 200px;
            overflow: hidden;
        }
        .tip-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .tip-card:hover .tip-image img {
            transform: scale(1.05);
        }
        .tip-icon {
            height: 100px;
            background: linear-gradient(135deg, #e8f0e6, #d4e4d0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: #2d6a4f;
        }
        .tip-content { padding: 28px; }
        .tip-content h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .tip-content p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 16px;
        }
        .tip-content ul {
            padding-left: 20px;
            color: #6c757d;
            line-height: 1.8;
        }
        .tip-content li { margin-bottom: 8px; }

        /* CTA Section avec image */
        .cta-section {
            background: linear-gradient(135deg, #e8f0e6, #c8dcc4);
            border-radius: 40px;
            margin: 40px 32px;
            padding: 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1535083783855-76ae62b2914e?w=1200&h=400&fit=crop') center/cover;
            opacity: 0.1;
            pointer-events: none;
        }
        .cta-section h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 16px;
            position: relative;
        }
        .cta-section p {
            font-size: 16px;
            color: #4a5b4d;
            margin-bottom: 32px;
            position: relative;
        }
        .cta-section .btn-register {
            position: relative;
        }

        /* Footer Premium */
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
        .footer-col a:hover { color: #86a788; }
        .copyright {
            text-align: center;
            padding-top: 48px;
            margin-top: 48px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 12px;
        }

        @media (max-width: 768px) {
            .hero-about h1 { font-size: 32px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
            .tips-grid { grid-template-columns: 1fr; }
            .footer-content { grid-template-columns: 1fr; }
            .container { padding: 40px 20px; }
            .section-title { font-size: 28px; }
            .cta-section { margin: 20px; padding: 40px 20px; }
            .cta-section h3 { font-size: 24px; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
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

    <!-- Hero Section avec image -->
    <section class="hero-about">
        <h1>À propos de Piko</h1>
        <p>Nous sommes une communauté dédiée aux passionnés d'oiseaux, engagée pour le bien-être animal et l'adoption responsable.</p>
    </section>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">1500+</div>
                <div class="stat-label">Annonces publiées</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-label">Éleveurs vérifiés</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">50+</div>
                <div class="stat-label">Espèces disponibles</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">98%</div>
                <div class="stat-label">Satisfaction client</div>
            </div>
        </div>
    </div>

    <!-- Mission Section avec image -->
    <section class="mission-section">
        <div class="mission-content">
            <h2>Notre mission</h2>
            <p>Chez Piko, nous croyons que chaque oiseau mérite un foyer aimant. Notre plateforme connecte des éleveurs responsables avec des passionnés d'oiseaux, en garantissant des transactions sécurisées et le respect des espèces protégées. Nous nous engageons à lutter contre le trafic d'animaux et à promouvoir une éthique irréprochable dans le monde de l'ornithologie.</p>
        </div>
    </section>

    <!-- Conseils Section avec images -->
    <div class="container">
        <h2 class="section-title">Conseils pour bien élever vos oiseaux</h2>
        <p class="section-subtitle">Des guides pratiques pour prendre soin de vos compagnons à plumes</p>
        <div class="tips-grid">
            <!-- Alimentation -->
            <div class="tip-card">
                <div class="tip-image">
                    <img src="https://images.unsplash.com/photo-1545249390-6bdfa286032f?w=400&h=200&fit=crop" alt="Alimentation oiseau">
                </div>
                <div class="tip-content">
                    <h3>🍎 Alimentation équilibrée</h3>
                    <p>Une bonne alimentation est essentielle pour la santé de votre oiseau.</p>
                    <ul>
                        <li>Graines de qualité (mélange adapté à l'espèce)</li>
                        <li>Fruits et légumes frais (pomme, carotte, épinards)</li>
                        <li>Supplements calciques (os de seiche, pierre minérale)</li>
                        <li>Eau fraîche changée quotidiennement</li>
                        <li>Éviter l'avocat, le chocolat et la caféine</li>
                    </ul>
                </div>
            </div>

            <!-- Habitat -->
            <div class="tip-card">
                <div class="tip-image">
                    <img src="https://images.unsplash.com/photo-1535083783855-76ae62b2914e?w=400&h=200&fit=crop" alt="Cage oiseau">
                </div>
                <div class="tip-content">
                    <h3>🏠 Habitat et cage</h3>
                    <p>Un environnement adapté pour le bien-être de votre compagnon.</p>
                    <ul>
                        <li>Cage spacieuse (minimum 50x50x70cm pour une perruche)</li>
                        <li>Barreaux horizontaux pour faciliter l'escalade</li>
                        <li>Perchoirs de différents diamètres</li>
                        <li>Jouets pour stimuler l'intelligence</li>
                        <li>Nettoyage hebdomadaire complet</li>
                    </ul>
                </div>
            </div>

            <!-- Soins -->
            <div class="tip-card">
                <div class="tip-image">
                    <img src="https://images.unsplash.com/photo-1624645838715-6edc94c7b9cf?w=400&h=200&fit=crop" alt="Vétérinaire oiseau">
                </div>
                <div class="tip-content">
                    <h3>🩺 Soins vétérinaires</h3>
                    <p>Prévenir plutôt que guérir.</p>
                    <ul>
                        <li>Visite annuelle chez un vétérinaire aviaire</li>
                        <li>Surveiller les signes de maladie</li>
                        <li>Coupe des griffes et du bec si nécessaire</li>
                        <li>Vaccinations recommandées</li>
                        <li>Vermifugation régulière</li>
                    </ul>
                </div>
            </div>

            <!-- Socialisation -->
            <div class="tip-card">
                <div class="tip-image">
                    <img src="https://images.unsplash.com/photo-1552728089-57bdde30beb3?w=400&h=200&fit=crop" alt="Socialisation oiseau">
                </div>
                <div class="tip-content">
                    <h3>🤝 Socialisation</h3>
                    <p>Les oiseaux sont des animaux sociaux.</p>
                    <ul>
                        <li>Passer du temps quotidien avec votre oiseau</li>
                        <li>Parler doucement pour créer un lien de confiance</li>
                        <li>Proposer des sorties hors cage sécurisées</li>
                        <li>Éviter les gestes brusques</li>
                        <li>Un deuxième oiseau peut être bénéfique</li>
                    </ul>
                </div>
            </div>

            <!-- Espèces protégées -->
            <div class="tip-card">
                <div class="tip-image">
                    <img src="https://images.unsplash.com/photo-1444464666168-49d633b86797?w=400&h=200&fit=crop" alt="Espèces protégées">
                </div>
                <div class="tip-content">
                    <h3>⚠️ Espèces protégées CITES</h3>
                    <p>Certaines espèces sont protégées par la loi.</p>
                    <ul>
                        <li>Vérifier la provenance avant l'achat</li>
                        <li>Demander un certificat de capacité</li>
                        <li>Ne jamais acheter une espèce braconnée</li>
                        <li>Signaler tout trafic aux autorités</li>
                        <li>Privilégier les éleveurs certifiés</li>
                    </ul>
                </div>
            </div>

            <!-- Reproduction -->
            <div class="tip-card">
                <div class="tip-image">
                    <img src="https://images.unsplash.com/photo-1545249390-6bdfa286032f?w=400&h=200&fit=crop" alt="Reproduction oiseaux">
                </div>
                <div class="tip-content">
                    <h3>🥚 Reproduction responsable</h3>
                    <p>La reproduction nécessite des connaissances.</p>
                    <ul>
                        <li>Ne reproduire que des oiseaux en bonne santé</li>
                        <li>Fournir un nichoir adapté</li>
                        <li>Alimentation enrichie pendant la période de reproduction</li>
                        <li>Limiter à 2-3 portées par an maximum</li>
                        <li>Préparer l'arrivée des bébés</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section avec image -->
    <div class="cta-section">
        <h3>Prêt à rejoindre l'aventure ?</h3>
        <p>Découvrez des annonces vérifiées et trouvez votre compagnon idéal.</p>
        <a href="{{ route('annonces.index') }}" class="btn-register" style="display: inline-block;">Explorer les annonces</a>
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