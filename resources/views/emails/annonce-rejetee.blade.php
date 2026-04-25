<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonce rejetée - Piko</title>
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
            background: rgba(220, 38, 38, 0.9);
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
        
        /* Raison Card */
        .raison-card {
            background: #fef2f2;
            border-radius: 20px;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #dc2626;
        }
        
        .raison-title {
            font-size: 13px;
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .raison-text {
            color: #7f1d1d;
            font-size: 14px;
            line-height: 1.5;
            background: white;
            padding: 12px 16px;
            border-radius: 12px;
            margin-top: 8px;
        }
        
        /* Tips List */
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
            color: #f59e0b;
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
        
        .support-text {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #eef2f0;
            color: #64748b;
            font-size: 13px;
        }
        
        .support-text a {
            color: #2d6a4f;
            text-decoration: none;
            font-weight: 600;
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
            .footer-links {
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
                Annonce non approuvée
            </div>
        </div>
        
        <!-- Content -->
        <div class="content">
            <h1 class="greeting">
                Bonjour <span>{{ $user->prenom }}</span>,
            </h1>
            
            <p class="intro-text">
                Nous avons examiné votre annonce et nous sommes au regret de vous informer qu'elle n'a pas été approuvée par notre équipe de modération.
            </p>
            
            <!-- Détails de l'annonce -->
            <div class="info-card">
                <div class="info-title">
                   Détails de l'annonce
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
                    <span class="info-label">Date de soumission</span>
                    <span class="info-value">{{ $annonce->created_at->format('d/m/Y à H:i') }}</span>
                </div>
            </div>
            
            <!-- Raison du rejet -->
            <div class="raison-card">
                <div class="raison-title">
                     Raison du rejet
                </div>
                <div class="raison-text">
                    {{ $raison }}
                </div>
            </div>
            
            <!-- Conseils -->
            <div class="tips-section">
                <div class="tips-title">
                    Comment corriger votre annonce
                </div>
                <ul class="tips-list">
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <span>Vérifiez que toutes les informations sont correctes et complètes</span>
                    </li>
                    <li>
                        <i class="fas fa-camera"></i>
                        <span>Ajoutez des photos claires et de qualité de l'oiseau</span>
                    </li>
                    <li>
                        <i class="fas fa-file-alt"></i>
                        <span>Respectez nos conditions d'utilisation et charte de modération</span>
                    </li>
                    <li>
                        <i class="fas fa-lightbulb"></i>
                        <span>Corrigez le problème mentionné dans la raison du rejet ci-dessus</span>
                    </li>
                </ul>
            </div>
            
            <!-- Actions -->
            <div class="btn-container">
                <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn-primary">
                    Modifier mon annonce
                </a>
            </div>
            
            <div class="support-text">
                <i class="fas fa-headset"></i> Besoin d'aide ? 
                <a href="#">Contactez notre support</a>
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
                Cet email vous a été envoyé car vous avez soumis une annonce sur Piko.
            </div>
        </div>
    </div>
</body>
</html>