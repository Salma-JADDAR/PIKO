<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piko · Répondre à l'acheteur</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7f5 0%, #e8f0e6 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .card {
            background: white;
            border-radius: 32px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo h1 {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #0f172a;
        }
        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eef2f0;
        }
        .form-group {
            margin-bottom: 24px;
        }
        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #2d6a4f;
        }
        input, textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: all 0.3s;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #2d6a4f;
            box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
        }
        textarea {
            resize: vertical;
            min-height: 150px;
        }
        .btn-send {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e4620, #2d6a4f);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(45,106,79,0.3);
        }
        .info-box {
            background: #e8f0e6;
            padding: 16px;
            border-radius: 16px;
            margin-bottom: 24px;
        }
        .info-box p {
            color: #2d6a4f;
            font-size: 14px;
        }
        .info-box i {
            margin-right: 8px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 24px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link:hover {
            color: #2d6a4f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <h1>🐦 Piko</h1>
            </div>
            
            <h2>Répondre à {{ $contact->nom_acheteur }}</h2>
            <div class="subtitle">Votre réponse sera envoyée directement par email</div>
            
            <div class="info-box">
                <p><i class="fas fa-info-circle"></i> Une fois que vous avez répondu, vous pourrez marquer l'annonce comme vendue.</p>
            </div>
            
            <form action="{{ route('repondre.acheteur.envoyer') }}" method="POST">
                @csrf
                <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                <input type="hidden" name="annonce_id" value="{{ $contact->annonce_id }}">
                
              <div class="form-group">
    <label>📱 Votre numéro de téléphone (optionnel)</label>
    <input type="tel" name="telephone" 
           value="{{ old('telephone', $telephoneVendeur) }}" 
           placeholder="+33 6 12 34 56 78"
           readonly
           style="background-color: #f5f5f5; cursor: not-allowed;">
    <small style="color: #64748b; display: block; margin-top: 5px;">
        Ce numéro sera envoyé à l'acheteur.
    </small>
</div>
                
                <div class="form-group">
                    <label>💬 Votre message *</label>
                    <textarea name="message" required placeholder="Bonjour, merci pour votre intérêt. Je suis disponible pour une rencontre ce week-end..."></textarea>
                </div>
                
                <button type="submit" class="btn-send">
                    <i class="fas fa-paper-plane"></i> Envoyer la réponse
                </button>
            </form>
            
            <a href="{{ route('annonces.show', $contact->annonce_id) }}" class="back-link">
                ← Retour à l'annonce
            </a>
        </div>
    </div>
</body>
</html>