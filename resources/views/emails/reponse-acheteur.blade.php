<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse du vendeur - Piko</title>
    <style>
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; padding: 10px !important; }
            .btn { display: block !important; width: 100% !important; text-align: center !important; }
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f5f7f5; margin: 0; padding: 20px;">
    <div class="container" style="max-width: 600px; margin: 0 auto; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        
        <!-- Entête Piko -->
        <div style="background: linear-gradient(135deg, #1e4620, #2d6a4f); padding: 30px 20px; text-align: center;">
            <h1 style="color: white; margin: 0; font-size: 28px;">🐦 Piko</h1>
            <p style="color: #e8f0e6; margin: 5px 0 0;">Marketplace aviaire responsable</p>
        </div>
        
        <!-- Contenu -->
        <div style="padding: 30px;">
            <h2 style="color: #2d6a4f; margin-top: 0;">📩 Réponse du vendeur</h2>
            
            <div style="background: #f8fafc; padding: 15px; border-radius: 12px; margin-bottom: 20px;">
                <p><strong>📋 Annonce :</strong> {{ $contact->annonce->titre }}</p>
                <p><strong>👤 Vendeur :</strong> {{ $contact->annonce->utilisateur->prenom }} {{ $contact->annonce->utilisateur->nom }}</p>
                @if($request->telephone)
                    <p><strong>📞 Téléphone :</strong> {{ $request->telephone }}</p>
                @endif
            </div>
            
            <div style="background: #f8fafc; padding: 15px; border-radius: 12px; margin-bottom: 20px;">
                <p><strong>💬 Message :</strong></p>
                <p style="background: white; padding: 12px; border-radius: 8px; border-left: 4px solid #2d6a4f;">{{ $request->message }}</p>
            </div>
            
            <div style="background: #e8f0e6; padding: 15px; border-radius: 12px; margin-bottom: 25px;">
                <p><strong>📝 Prochaines étapes :</strong></p>
                <ul style="margin: 0; padding-left: 20px;">
                    <li>Contactez le vendeur par téléphone si disponible</li>
                    <li>Planifiez une rencontre pour voir l'oiseau</li>
                    <li>Préparez les documents nécessaires (certificat, bagues)</li>
                    <li>Discutez des détails de la transaction</li>
                </ul>
            </div>
            
            <div style="text-align: center;">
                <a href="{{ route('annonces.show', $contact->annonce_id) }}" class="btn" style="background: #2d6a4f; color: white; padding: 12px 24px; text-decoration: none; border-radius: 40px; display: inline-block;">
                    Voir l'annonce
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        <div style="background: #f1f5f9; padding: 20px; text-align: center; font-size: 12px; color: #64748b;">
            <p>Cet email a été envoyé automatiquement via Piko.<br>
            Merci de ne pas répondre directement à cet email.</p>
        </div>
    </div>
</body>
</html>