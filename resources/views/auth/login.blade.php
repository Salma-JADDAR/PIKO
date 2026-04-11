<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Connexion</title>
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

        .login-container {
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

        .form-group { margin-bottom: 24px; }
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

        .password-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        .forgot-link {
            font-size: 12px;
            color: #2d6a4f;
            text-decoration: none;
            font-weight: 500;
        }
        .forgot-link:hover {
            text-decoration: underline;
        }

        .password-input {
            position: relative;
        }
        .password-input input {
            padding-right: 46px;
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
            z-index: 2;
            background: transparent;
        }
        .toggle-password:hover {
            color: #2d6a4f;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 28px;
        }
        .checkbox-group input {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #2d6a4f;
        }
        .checkbox-group label {
            font-size: 13px;
            color: #374151;
            cursor: pointer;
            margin: 0;
        }

        .btn-login {
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
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-login:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 6px 20px rgba(45, 106, 79, 0.3); 
        }

        .register-link { 
            text-align: center; 
            margin-top: 28px; 
            font-size: 13px; 
            color: #6b7280; 
        }
        .register-link a { 
            color: #2d6a4f; 
            text-decoration: none; 
            font-weight: 700; 
            transition: color 0.2s;
        }
        .register-link a:hover { 
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
            background-image: url("{{ asset('images/login.png') }}");
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
            background: linear-gradient(145deg, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.8) 100%);
        }

        .hero-content {
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

        .hero-quote {
            font-size: 40px;
            font-weight: 800;
            line-height: 1.3;
            color: white;
            margin-bottom: 24px;
            letter-spacing: -0.5px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
            text-align: left;
        }

        .hero-description {
            font-size: 14px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.85);
            max-width: 90%;
            text-align: left;
        }

        @media (max-width: 900px) {
            .login-container { flex-direction: column; max-width: 550px; }
            .form-side { width: 100%; padding: 32px 28px; }
            .hero-side { width: 100%; min-height: 300px; }
            .hero-content { padding: 40px 30px; }
            .hero-quote { font-size: 20px; }
            .hero-description { font-size: 13px; max-width: 100%; }
        }

        @media (max-width: 480px) {
            .form-side { padding: 24px 20px; }
            .form-header h2 { font-size: 26px; }
            .hero-side { min-height: 280px; }
            .hero-content { padding: 30px 24px; }
            .hero-quote { font-size: 18px; }
            .hero-description { font-size: 12px; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="form-side">
            <div class="logo">
                <h1>Piko</h1>
                <span>AVIAIRE MARKETPLACE</span>
            </div>

            <div class="form-header">
                <h2>Welcome Back</h2>
                <p>Entrez vos identifiants pour accéder au sanctuaire aviaire.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                    </div>
                    @error('email')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="password-row">
                        <label for="password">Mot de passe</label>
                        <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                    </div>
                    <div class="password-input">
                        <div class="input-wrapper">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" id="password" name="password" placeholder="*********" required>
                        </div>
                        <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
                    </div>
                    @error('password')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Rester connecté</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-arrow-right-to-bracket"></i> Se connecter
                </button>

                <p class="register-link">
                   Nouveau ici ?
                    <a href="{{ route('register') }}">Créer un compte</a>
                </p>
            </form>
        </div>

        <div class="hero-side">
            <div class="hero-content">
                <div class="hero-quote">
                    Le conservateur biologique de l'excellence aviaire.
                </div>
                <div class="hero-description">
                    Replongez dans notre marché soigneusement sélectionné, où chaque plume et chaque lignée sont célébrées avec le respect qu'elles méritent.
                </div>
            </div>
        </div>
    </div>

    <script>
  
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function() {
        
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
          
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        }
    </script>
</body>
</html>