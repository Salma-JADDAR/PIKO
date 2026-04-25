<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonce approuvée - Piko</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Inter', sans-serif;
            background: linear-gradient(135deg, #e8f0e6 0%, #d4e4d0 100%);
            margin: 0;
            padding: 40px 20px;
            line-height: 1.5;
        }
        
        .container {
            max-width: 580px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        /* Header */
        .header {
            background: linear-gradient(135deg, #0a1a0a 0%, #1e4620 100%);
            padding: 32px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
            pointer-events: none;
        }
        
        .logo {
            font-size: 32px;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .logo span {
            background: rgba(255,255,255,0.15);
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .header-badge {
            display: inline-block;
            background: linear-gradient(135deg, #2d6a4f, #1e4620);
            padding: 6px 16px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            margin-top: 12px;
        }
        
        /* Content */
        .content {
            padding: 32px 32px 24px;
        }
        
        .greeting {
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 16px;
            letter-spacing: -0.3px;
        }
        
        .greeting span {
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .intro-text {
            color: #475569;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        
        /* Success Card */
        .success-card {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            border-radius: 20px;
            padding: 24px;
            margin: 20px 0;
            text-align: center;
            border: 1px solid #bbf7d0;
        }
        
        .success-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #2d6a4f, #1e4620);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }
        
        .success-icon i {
            font-size: 32px;
            color: white;
        }
        
        .success-title {
            font-size: 20px;
            font-weight: 800;
            color: #166534;
            margin-bottom: 8px;
        }
        
        .success-subtitle {
            font-size: 13px;
            color: #15803d;
        }
        
        /* Info Card */
        .info-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #eef2f0;
        }
        
        .info-title {
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .info-title i {
            color: #2d6a4f;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-size: 13px;
            color: #64748b;
            font-weight: 500;
        }
        
        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
        }
        
        .price-value {
            color: #2d6a4f;
            font-size: 16px;
            font-weight: 800;
        }
        
        /* Visibility Card */
        .visibility-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }
        
        .visibility-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 16px;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 24px;
            font-weight: 800;
            color: #2d6a4f;
        }
        
        .stat-label {
            font-size: 11px;
            color: #64748b;
            margin-top: 4px;
        }
        
        /* Tips Section */
        .tips-section {
            margin: 24px 0;
        }
        
        .tips-title {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .tips-list {
            list-style: none;
            padding: 0;
        }
        
        .tips-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            color: #475569;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .tips-list li:last-child {
            border-bottom: none;
        }
        
        .tips-list li i {
            width: 20px;
            color: #10b981;
            font-size: 14px;
        }
        
        /* Button */
        .btn-container {
            text-align: center;
            margin: 28px 0 20px;
        }
        
        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(45, 106, 79, 0.25);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45, 106, 79, 0.35);
        }
        
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #2d6a4f;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            margin-top: 12px;
        }
        
        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 16px;
        }
        
        .share-btn {
            width: 40px;
            height: 40px;
            background: #f1f5f9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #64748b;
            transition: all 0.2s;
        }
        
        .share-btn:hover {
            background: #2d6a4f;
            color: white;
            transform: translateY(-2px);
        }
        
        /* Footer */
        .footer {
            background: #f8fafc;
            padding: 24px 32px;
            text-align: center;
            border-top: 1px solid #eef2f0;
        }
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }
        
        .footer-links a {
            color: #64748b;
            text-decoration: none;
            font-size: 12px;
            transition: color 0.2s;
        }
        
        .footer-links a:hover {
            color: #2d6a4f;
        }
        
        .copyright {
            font-size: 11px;
            color: #94a3b8;
        }
        
        /* Responsive */
        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }
            .content {
                padding: 24px 20px;
            }
            .header {
                padding: 24px 20px;
            }
            .footer {
                padding: 20px 24px;
            }
            .greeting {
                font-size: 20px;
            }
            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }
            .btn-primary {
                width: 100%;
                padding: 12px 20px;
            }
            .visibility-stats {
                flex-direction: column;
                gap: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                Piko
                <span>Marketplace aviaire</span>
            </div>
            <div class="header-badge">
                 Annonce approuvée
            </div>
        </div>
        
        <!-- Content -->
        <div class="content">
            <h1 class="greeting">
                Félicitations <span>{{ $user->prenom }}</span> ! 
            </h1>
            
            <p class="intro-text">
                Nous avons le plaisir de vous informer que votre annonce a été approuvée par notre équipe de modération. Elle est désormais visible sur notre marketplace.
            </p>
            
            <!-- Success Card -->
            <div class="success-card">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="success-title">
                    Annonce publiée avec succès !
                </div>
                <div class="success-subtitle">
                    Votre annonce est maintenant visible par tous les visiteurs
                </div>
            </div>
            
            <!-- Détails de l'annonce -->
            <div class="info-card">
                <div class="info-title">
                   Récapitulatif de votre annonce
                </div>
                <div class="info-row">
                    <span class="info-label">Titre</span>
                    <span class="info-value">{{ $annonce->titre }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Espèce</span>
                    <span class="info-value">{{ $annonce->espece->nom_commun }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Prix</span>
                    <span class="info-value price-value">{{ number_format($annonce->prix, 0, ',', ' ') }} €</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date de publication</span>
                    <span class="info-value">{{ now()->format('d/m/Y à H:i') }}</span>
                </div>
            </div>
            
            <!-- Visibilité -->
            <div class="visibility-card">
                <div class="info-title" style="justify-content: center;">
                   Visibilité de votre annonce
                </div>
                <div class="visibility-stats">
                    <div class="stat-item">
                        <div class="stat-number">+40%</div>
                        <div class="stat-label">de vues en moyenne</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24h</div>
                        <div class="stat-label">premier contact</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">de satisfaction</div>
                    </div>
                </div>
            </div>
            
            <!-- Conseils -->
            <div class="tips-section">
                <div class="tips-title">
                  Pour maximiser vos chances de vente
                </div>
                <ul class="tips-list">
                    <li>
                        <i class="fas fa-camera"></i>
                        <span>Ajoutez plus de photos de qualité pour attirer les acheteurs</span>
                    </li>
                    <li>
                        <i class="fas fa-message"></i>
                        <span>Répondez rapidement aux messages des acheteurs intéressés</span>
                    </li>
                    <li>
                        <i class="fas fa-chart-line"></i>
                        <span>Suivez les statistiques de votre annonce depuis votre tableau de bord</span>
                    </li>
                    <li>
                        <i class="fas fa-tag"></i>
                        <span>Marquez votre annonce comme "Vendue" une fois la transaction terminée</span>
                    </li>
                </ul>
            </div>
            
            <!-- Actions -->
            <div class="btn-container">
                <a href="{{ route('annonces.show', $annonce->id) }}" class="btn-primary">
                    Voir mon annonce
                </a>
            </div>
            
            <div class="btn-container" style="margin-top: 0;">
                <a href="{{ route('mes-annonces') }}" class="btn-secondary">
                   Gérer mes annonces
                </a>
            </div>
            
            <!-- Partage -->
            <div class="support-text" style="text-align: center; margin-top: 24px; padding-top: 20px; border-top: 1px solid #eef2f0;">
                <i class="fas fa-share-alt"></i> Partagez votre annonce sur les réseaux sociaux
                <div class="share-buttons">
                    <a href="#" class="share-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="share-btn"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="share-btn"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="share-btn"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-links">
                <a href="#">Conditions générales</a>
                <a href="#">Politique de confidentialité</a>
                <a href="#">Aide</a>
            </div>
            <div class="copyright">
                © 2024 PIKO – Marketplace d'annonces aviaires. Tous droits réservés.
            </div>
            <div class="copyright" style="margin-top: 8px;">
                Cet email vous a été envoyé car votre annonce a été approuvée sur Piko.
            </div>
        </div>
    </div>
</body>
</html>