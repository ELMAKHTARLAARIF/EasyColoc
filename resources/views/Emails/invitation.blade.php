<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invitation à rejoindre {{ $colocation->name }}</title>
</head>
<body>
    <h2>Bonjour,</h2>
    <p>Vous avez été invité(e) à rejoindre la colocation <strong>{{ $colocation->name }}</strong>.</p>

    <p>Message :</p>
    <h3>{{ $invitation->token }}</h3>

    <p>
         use token to join {{ $colocation->name }}(valable 7 jours) :
    </p>
    <p>
        <a href="{{ route('accept_invitation', ['token' => $invitation->token]) }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">
            Rejoindre la colocation
        </a>
    </p>

    <p>Merci !</p>
</body>
</html>