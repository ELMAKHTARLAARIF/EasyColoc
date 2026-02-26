<p>Bonjour,</p>
<p><strong>{{ $colocation->name }}</strong> vous invite à rejoindre leur colocation.</p>
<p>
  <a href="{{ url('/join/' . $invitation->token) }}">
    Rejoindre la colocation →
  </a>
</p>
<p><small>Ce lien expire le {{ $invitation->expires_at->format('d/m/Y à H:i') }}</small></p>