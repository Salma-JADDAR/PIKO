<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouvelle demande</title>
</head>
<body>
    <div style="max-width: 600px; margin: auto; padding: 20px;">
        <h2>Nouveau message pour "{{ $annonce->titre }}"</h2>
        <p><strong>De :</strong> {{ $request->nom }} ({{ $request->email }})</p>
        <p><strong>Message :</strong></p>
        <p>{{ $request->message }}</p>
        <hr>
        <a href="{{ route('repondre.acheteur.form', ['contactId' => $contact->id]) }}" 
           style="background: #2d6a4f; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Répondre à l'acheteur
        </a>
    </div>
</body>
</html>