<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte suspendu - Piko</title>
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
            max-width: 560px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        /* Header Premium */
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
            background: #dc2626;
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
        
        /* Warning Card */
        .warning-card {
            background: #fef2f2;
            border-radius: 20px;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #dc2626;
        }
        
        .warning-title {
            font-size: 13px;
            font-weight: 700;
            color: #991b1b;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .warning-text {
            color: #7f1d1d;
            font-size: 14px;
            line-height: 1.5;
        }
        
        /* Consequences List */
        .consequences {
            margin: 20px 0;
        }
        
        .consequences-title {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 12px;
        }
        
        .consequences-list {
            list-style: none;
            padding: 0;
        }
        
        .consequences-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            color: #475569;
            font-size: 14px;
        }
        
        .consequences-list li i {
            width: 20px;
            color: #dc2626;
            font-size: 12px;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Premium -->
        <div class="header">
            <div class="logo">
                🦜 Piko
                <span>Marketplace aviaire</span>
            </div>
            <div class="header-badge">
                ⚠️ Compte suspendu
            </div>
        </div>
        
        <!-- Content -->
        <div class="content">
            <h1 class="greeting">
                Bonjour <span>{{ $user->prenom }}</span>,
            </h1>
            
            <p class="intro-text">
                Nous vous informons que votre compte a été temporairement suspendu suite à une violation de nos conditions d'utilisation.
            </p>
            
            <!-- Détails de la suspension -->
            <div class="info-card">
                <div class="info-title">
                  Détails de la suspension
                </div>
                <div class="info-row">
                    <span class="info-label">Durée</span>
                    <span class="info-value">{{ $duree }} jour(s)</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date de début</span>
                    <span class="info-value">{{ date('d/m/Y à H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Date de fin</span>
                    <span class="info-value">{{ date('d/m/Y', strtotime('+' . $duree . ' days')) }}</span>
                </div>
            </div>
            
            <!-- Raison -->
            <div class="warning-card">
                <div class="warning-title">
                    Raison de la suspension
                </div>
                <div class="warning-text">
                    {{ $raison }}
                </div>
            </div>
            
            <!-- Conséquences -->
            <div class="consequences">
                <div class="consequences-title">
                    Pendant cette période, vous ne pourrez pas :
                </div>
                <ul class="consequences-list">
                    <li>
                        <i class="fas fa-ban"></i>
                        <span>Publier de nouvelles annonces</span>
                    </li>
                    <li>
                        <i class="fas fa-edit"></i>
                        <span>Modifier vos annonces existantes</span>
                    </li>
                    <li>
                        <i class="fas fa-comment"></i>
                        <span>Contacter d'autres membres</span>
                    </li>
                </ul>
            </div>
            
            <!-- Message de fin -->
            <p style="color: #475569; margin-top: 20px;">
                Passé ce délai, votre compte sera automatiquement réactivé. Si vous avez des questions ou souhaitez contester cette décision, n'hésitez pas à contacter notre support.
            </p>
            
           
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
                Cet email vous a été envoyé car votre compte a été suspendu sur Piko.
            </div>
        </div>
    </div>
</body>
</html>