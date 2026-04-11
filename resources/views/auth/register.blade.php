<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Inscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e8f0e6 0%, #d4e4d0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

 
        .register-container {
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            flex-wrap: wrap;
        }

  
        .form-side {
            flex: 1;
            width: 50%;
            padding: 40px 40px;
            background: white;
        }

     
        .logo {
            text-align: center;
            margin-bottom: 36px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e8ecef;
        }
        .logo h1 {
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
        .logo h1::after {
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
        .logo span {
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

        .form-group { margin-bottom: 20px; }
        .form-group label { 
            display: block; 
            font-size: 13px; 
            font-weight: 600; 
            color: #374151; 
            margin-bottom: 8px;
        }

        .input-wrapper { position: relative; }
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

        .password-input { position: relative; }
        .password-input input { padding-right: 42px; }
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
        .toggle-password:hover { color: #2d6a4f; }

        .password-hint { 
            display: block; 
            font-size: 11px; 
            color: #9ca3af; 
            margin-top: 6px;
        }

        .btn-register {
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
        .btn-register:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.3); 
        }

        .login-link { 
            text-align: center; 
            margin-top: 24px; 
            font-size: 13px; 
            color: #6b7280; 
        }
        .login-link a { 
            color: #2d6a4f; 
            text-decoration: none; 
            font-weight: 700; 
            transition: color 0.2s;
        }
        .login-link a:hover { 
            color: #1e4620;
            text-decoration: underline; 
        }

        .error-message { 
            display: block; 
            color: #dc2626; 
            font-size: 11px; 
            margin-top: 5px; 
        }

        .hero-side {
            flex: 1;
            width: 50%;
            position: relative;
            background-image: url("{{ asset('images/registre.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: auto;
        }

        .hero-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(145deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.75) 100%);
        }

        .featured-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 50px 35px;
            max-width: 100%;
            margin: 0;
            top: 70%;
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

 
        .featured-content h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            color: white;
            letter-spacing: -0.5px;
        }

  
        .quote-wrapper {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 20px 24px;
            margin: 24px 0;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .quote {
            font-style: italic;
            font-size: 14px;
            line-height: 1.6;
            color: white;
            font-weight: 400;
            text-align: center;
            margin: 0;
        }

        .description {
            font-size: 13px;
            line-height: 1.6;
            text-align: center;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 8px;
        }

  
        @media (max-width: 900px) {
            .register-container { flex-direction: column; max-width: 550px; }
            .form-side { width: 100%; padding: 32px 28px; }
            .hero-side { width: 100%; min-height: 450px; }
            .featured-content { top: auto; transform: none; padding: 40px 30px; }
            .featured-content h2 { font-size: 32px; }
        }

        @media (max-width: 480px) {
            .form-side { padding: 24px 20px; }
            .form-header h2 { font-size: 26px; }
            .hero-side { min-height: 400px; }
            .featured-content h2 { font-size: 28px; }
            .quote-wrapper { padding: 16px 18px; }
            .quote { font-size: 13px; }
            .description { font-size: 12px; }
        }
    </style>
</head>
<body>
    <div class="register-container">

        <div class="form-side">
            <div class="logo">
                <h1>Piko</h1>
                <span>AVIAIRE MARKETPLACE</span>
            </div>

            <div class="form-header">
                <h2>Join the Avian Sanctuary</h2>
                <p>Accédez à une communauté d'éleveurs passionnés.</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="pseudo">Pseudonyme</label>
                    <div class="input-wrapper">
                        <i class="fas fa-feather-alt input-icon"></i>
                        <input type="text" id="pseudo" name="pseudo" value="{{ old('pseudo') }}" placeholder="salmajaddar" required>
                    </div>
                    @error('pseudo')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="salma@example.com" required>
                    </div>
                    @error('email')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="password-input">
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" placeholder="Créez un mot de passe" required>
                        </div>
                        <i class="fas fa-eye-slash toggle-password"></i>
                    </div>
                    <small class="password-hint">🔒 Minimum 8 caractères</small>
                    @error('password')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i> Créer mon compte
                </button>

                <p class="login-link">
                    Déjà membre ? <a href="{{ route('login') }}">Connectez-vous</a>
                </p>
            </form>
        </div>

        <div class="hero-side">
            <div class="featured-content">
                <div class="featured-badge">
                    <i class="fas fa-star" style="margin-right: 6px;"></i> ESPÈCES EN VEDETTE
                </div>
                <h2>Tangara émeraude</h2>
                <div class="quote-wrapper">
                    <div class="quote">
                        « À chaque promenade dans la nature, on reçoit bien plus que ce que l'on cherche. »
                    </div>
                </div>
                <p class="description">
                    Rejoignez une communauté qui valorise le patrimoine biologique de notre monde.
                </p>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.querySelector('#password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    </script>
</body>
</html>