<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte réactivé - Piko</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Inter', sans-serif;
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
        .header {
            background: linear-gradient(135deg, #0a1a0a 0%, #1e4620 100%);
            padding: 32px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .logo {
            font-size: 32px;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
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
            background: #10b981;
            padding: 6px 16px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            margin-top: 12px;
        }
        .content { padding: 32px 32px 24px; }
        .greeting { font-size: 24px; font-weight: 700; color: #0f172a; margin-bottom: 16px; }
        .greeting span { background: linear-gradient(135deg, #1e4620, #2d6a4f); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .intro-text { color: #475569; font-size: 15px; line-height: 1.6; margin-bottom: 24px; }
        .success-card {
            background: linear-gradient(135deg, #f0fdf4, #dcfce7);
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            margin: 20px 0;
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
        .success-icon i { font-size: 32px; color: white; }
        .success-title { font-size: 20px; font-weight: 800; color: #166534; margin-bottom: 8px; }
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
            margin-top: 20px;
        }
        .footer {
            background: #f8fafc;
            padding: 24px 32px;
            text-align: center;
            border-top: 1px solid #eef2f0;
        }
        .copyright { font-size: 11px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo"> Piko<span>Marketplace aviaire</span></div>
            <div class="header-badge"> Compte réactivé</div>
        </div>
        <div class="content">
            <h1 class="greeting">Bonjour <span>{{ $user->prenom }}</span>,</h1>
            <p class="intro-text">Nous avons le plaisir de vous informer que votre compte a été réactivé.</p>
            <div class="success-card">
                <div class="success-icon"><i class="fas fa-check-circle"></i></div>
                <div class="success-title">Compte réactivé !</div>
                <p style="color: #166534;">Vous pouvez à nouveau publier des annonces.</p>
            </div>
            <p style="color: #475569;">Date de réactivation : {{ $date }}</p>
            <div style="text-align: center;">
                <a href="{{ route('login') }}" class="btn-primary"> Se connecter</a>
            </div>
        </div>
        <div class="footer">
            <div class="copyright">© 2024 PIKO – Marketplace d'annonces aviaires</div>
        </div>
    </div>
</body>
</html>