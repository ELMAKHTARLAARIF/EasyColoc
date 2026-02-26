<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoLoc — Ma Colocation</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --cream: #FAF7F2; --sand: #E8E0D5; --terracotta: #C4704A;
    --terracotta-light: #D4875F; --dark: #2A2420; --muted: #7A6F68;
    --white: #FFFFFF; --green: #4A9268; --red: #C04A4A;
  }
  body { font-family: 'DM Sans', sans-serif; background: var(--cream); display: flex; min-height: 100vh; }
  .sidebar { width: 240px; background: var(--dark); display: flex; flex-direction: column; padding: 2rem 1.25rem; position: fixed; height: 100vh; z-index: 10; }
  .logo { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: white; margin-bottom: 2.5rem; }
  .logo span { color: var(--terracotta); }
  .nav-label { font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.1em; color: rgba(255,255,255,0.3); margin-bottom: 0.75rem; padding: 0 0.5rem; }
  .nav-item { display: flex; align-items: center; gap: 0.75rem; padding: 0.65rem 0.75rem; border-radius: 8px; color: rgba(255,255,255,0.55); font-size: 0.875rem; text-decoration: none; transition: all 0.2s; margin-bottom: 2px; }
  .nav-item:hover { background: rgba(255,255,255,0.07); color: white; }
  .nav-item.active { background: var(--terracotta); color: white; }
  .nav-icon { font-size: 1.1rem; width: 20px; text-align: center; }
  .sidebar-footer { margin-top: auto; padding: 1rem 0.75rem; border-top: 1px solid rgba(255,255,255,0.1); }
  .user-mini { display: flex; align-items: center; gap: 0.75rem; }
  .avatar-sm { width: 34px; height: 34px; border-radius: 50%; background: var(--terracotta); display: flex; align-items: center; justify-content: center; font-weight: 500; color: white; font-size: 0.8rem; }
  .user-mini-name { color: white; font-size: 0.85rem; font-weight: 500; }
  .user-mini-role { color: rgba(255,255,255,0.4); font-size: 0.72rem; }
  .badge-admin { background: rgba(196,112,74,0.3); color: var(--terracotta-light); border-radius: 4px; padding: 1px 5px; font-size: 0.65rem; }

  .main { margin-left: 240px; flex: 1; padding: 2.5rem; }
  .page-nav { display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1.5rem; }
  .page-nav a { font-size: 0.75rem; color: var(--terracotta); text-decoration: none; padding: 0.25rem 0.6rem; border: 1px solid rgba(196,112,74,0.3); border-radius: 20px; }
  .page-nav a:hover { background: var(--terracotta); color: white; }

  .topbar { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 2rem; }
  .topbar h1 { font-family: 'Playfair Display', serif; font-size: 1.75rem; color: var(--dark); }
  .topbar p { color: var(--muted); font-size: 0.875rem; margin-top: 0.2rem; }
  .btn-danger { padding: 0.6rem 1.2rem; background: none; border: 1.5px solid var(--red); color: var(--red); border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 0.85rem; cursor: pointer; transition: all 0.2s; }
  .btn-danger:hover { background: var(--red); color: white; }
  .btn-primary { padding: 0.65rem 1.25rem; background: var(--terracotta); color: white; border: none; border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 0.875rem; cursor: pointer; }

  .card { background: var(--white); border-radius: 14px; border: 1px solid var(--sand); padding: 1.75rem; margin-bottom: 1.5rem; }
  .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; }
  .card-title { font-family: 'Playfair Display', serif; font-size: 1.15rem; color: var(--dark); }

  /* Coloc info */
  .coloc-hero {
    background: linear-gradient(135deg, var(--dark) 0%, #3D3028 100%);
    border-radius: 16px; padding: 2rem; margin-bottom: 1.5rem;
    position: relative; overflow: hidden;
  }
  .coloc-hero::before {
    content: '🏠'; position: absolute; right: 2rem; top: 50%; transform: translateY(-50%);
    font-size: 5rem; opacity: 0.08;
  }
  .coloc-hero-name { font-family: 'Playfair Display', serif; font-size: 2rem; color: white; margin-bottom: 0.25rem; }
  .coloc-hero-addr { color: rgba(255,255,255,0.5); font-size: 0.875rem; margin-bottom: 1.5rem; }
  .coloc-meta { display: flex; gap: 2rem; }
  .coloc-meta-item { }
  .coloc-meta-label { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em; color: rgba(255,255,255,0.35); margin-bottom: 0.25rem; }
  .coloc-meta-value { font-size: 0.95rem; color: white; font-weight: 500; }
  .status-badge { display: inline-flex; align-items: center; gap: 0.4rem; background: rgba(74,146,104,0.25); color: #6DC99A; border-radius: 20px; padding: 0.3rem 0.9rem; font-size: 0.78rem; font-weight: 500; }
  .status-dot { width: 6px; height: 6px; border-radius: 50%; background: #6DC99A; }

  /* Invite section */
  .invite-box {
    background: rgba(196,112,74,0.06); border: 1.5px dashed rgba(196,112,74,0.35);
    border-radius: 12px; padding: 1.25rem; display: flex; align-items: center; gap: 1rem;
    margin-bottom: 1.5rem;
  }
  .invite-icon { font-size: 1.5rem; }
  .invite-info { flex: 1; }
  .invite-info h4 { font-size: 0.9rem; color: var(--dark); font-weight: 500; margin-bottom: 0.2rem; }
  .invite-info p { font-size: 0.78rem; color: var(--muted); }
  .invite-link { font-size: 0.75rem; font-family: monospace; background: var(--sand); padding: 0.4rem 0.75rem; border-radius: 6px; color: var(--dark); margin-top: 0.5rem; display: block; word-break: break-all; }
  .btn-copy { padding: 0.5rem 1rem; background: var(--terracotta); color: white; border: none; border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 0.8rem; cursor: pointer; white-space: nowrap; }

  /* Members table */
  .members-table { width: 100%; border-collapse: collapse; }
  .members-table th { text-align: left; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted); padding: 0 0.75rem 0.75rem; font-weight: 500; }
  .members-table td { padding: 0.85rem 0.75rem; border-top: 1px solid var(--sand); font-size: 0.875rem; }
  .members-table tr:last-child td { border-bottom: none; }
  .member-cell { display: flex; align-items: center; gap: 0.75rem; }
  .avatar { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.78rem; font-weight: 600; color: white; flex-shrink: 0; }
  .av1{background:#C4704A} .av2{background:#4A9268} .av3{background:#6482C8} .av4{background:#B478C8}
  .member-name { font-weight: 500; color: var(--dark); }
  .member-email { font-size: 0.75rem; color: var(--muted); }
  .role-tag { font-size: 0.65rem; padding: 2px 7px; border-radius: 4px; font-weight: 500; }
  .tag-owner { background: rgba(196,112,74,0.15); color: var(--terracotta); }
  .tag-member { background: rgba(74,146,104,0.12); color: var(--green); }
  .rep-badge { display: flex; align-items: center; gap: 0.3rem; font-size: 0.8rem; color: var(--dark); }
  .stars { color: var(--terracotta); font-size: 0.75rem; }
  .balance-pos { color: var(--green); font-weight: 500; }
  .balance-neg { color: var(--red); font-weight: 500; }
  .actions-cell { display: flex; gap: 0.5rem; }
  .btn-kick { font-size: 0.75rem; padding: 0.3rem 0.7rem; border: 1.5px solid rgba(192,74,74,0.3); color: var(--red); background: none; border-radius: 6px; cursor: pointer; }
  .btn-kick:hover { background: var(--red); color: white; }
  .joined-date { color: var(--muted); font-size: 0.78rem; }

  /* Pending invites */
  .invite-item { display: flex; align-items: center; justify-content: space-between; padding: 0.85rem 0; border-bottom: 1px solid var(--sand); }
  .invite-item:last-child { border-bottom: none; }
  .invite-email { font-size: 0.875rem; color: var(--dark); }
  .invite-status { display: flex; align-items: center; gap: 0.4rem; font-size: 0.75rem; color: var(--muted); }
  .status-pending { background: rgba(196,112,74,0.12); color: var(--terracotta); border-radius: 4px; padding: 2px 7px; }
  .btn-revoke { font-size: 0.72rem; padding: 0.25rem 0.6rem; border: 1px solid var(--sand); background: none; border-radius: 5px; color: var(--muted); cursor: pointer; }

  /* Danger zone */
  .danger-zone { border: 1.5px solid rgba(192,74,74,0.25); border-radius: 14px; padding: 1.5rem; }
  .danger-zone h3 { font-size: 0.9rem; color: var(--red); margin-bottom: 0.4rem; font-weight: 500; }
  .danger-zone p { font-size: 0.82rem; color: var(--muted); margin-bottom: 1rem; }
  .btn-danger-full { padding: 0.65rem 1.25rem; background: none; border: 1.5px solid var(--red); color: var(--red); border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 0.85rem; cursor: pointer; }
  .btn-danger-full:hover { background: var(--red); color: white; }

  /* Modal */
  .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(42,36,32,0.6); z-index: 100; align-items: center; justify-content: center; }
  .modal-overlay.open { display: flex; }
  .modal { background: white; border-radius: 16px; padding: 2rem; width: 460px; max-width: 90vw; }
  .modal h3 { font-family: 'Playfair Display', serif; font-size: 1.3rem; color: var(--dark); margin-bottom: 0.5rem; }
  .modal p { font-size: 0.875rem; color: var(--muted); margin-bottom: 1.5rem; }
  .modal .field { margin-bottom: 1rem; }
  .modal .field label { display: block; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.04em; color: var(--dark); margin-bottom: 0.4rem; }
  .modal .field input { width: 100%; padding: 0.75rem 1rem; border: 1.5px solid var(--sand); border-radius: 9px; font-family: 'DM Sans', sans-serif; font-size: 0.9rem; outline: none; }
  .modal .field input:focus { border-color: var(--terracotta); }
  .modal-actions { display: flex; gap: 0.75rem; justify-content: flex-end; }
  .btn-cancel { padding: 0.65rem 1.25rem; background: none; border: 1.5px solid var(--sand); color: var(--muted); border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 0.875rem; cursor: pointer; }
</style>
</head>
<body>
<aside class="sidebar">
  <div class="logo">Co<span>Loc</span></div>
  <nav>
    <div class="nav-label">Navigation</div>
    <a class="nav-item" href="02-dashboard.html"><span class="nav-icon">⊞</span> Dashboard</a>
    <a class="nav-item active" href="03-colocation.html"><span class="nav-icon">🏠</span> Ma Colocation</a>
    <a class="nav-item" href="04-expenses.html"><span class="nav-icon">💶</span> Dépenses</a>
    <a class="nav-item" href="05-balances.html"><span class="nav-icon">⚖️</span> Balances</a>
    <a class="nav-item" href="07-profile.html"><span class="nav-icon">👤</span> Profil</a>
    <a class="nav-item" href="06-admin.html"><span class="nav-icon">🛡️</span> Administration</a>
  </nav>
  <div class="sidebar-footer">
    <div class="user-mini">
      <div class="avatar-sm">MD</div>
      <div>
        <div class="user-mini-name">Marie Dupont</div>
        <div class="user-mini-role"><span class="badge-admin">Admin</span></div>
      </div>
    </div>
  </div>
</aside>

<main class="main">
  <div class="page-nav">
    <a href="01-auth.html">← Auth</a>
    <a href="02-dashboard.html">← Dashboard</a>
    <a href="04-expenses.html">→ Dépenses</a>
    <a href="05-balances.html">→ Balances</a>
    <a href="06-admin.html">→ Admin</a>
  </div>

  <div class="topbar">
    <div>
      <h1>Ma Colocation</h1>
      <p>Gérez les membres, invitations et paramètres</p>
    </div>
    <button class="btn-primary" onclick="document.getElementById('inviteModal').classList.add('open')">+ Inviter un membre</button>
  </div>

  <!-- Coloc Hero -->
  <div class="coloc-hero">
    <div class="coloc-hero-name">Appartement Saint-Michel</div>
    <div class="coloc-hero-addr">12 Rue de la Huchette, 75005 Paris</div>
    <div class="coloc-meta">
      <div class="coloc-meta-item">
        <div class="coloc-meta-label">Statut</div>
        <div><span class="status-badge"><span class="status-dot"></span>Active</span></div>
      </div>
      <div class="coloc-meta-item">
        <div class="coloc-meta-label">Créée le</div>
        <div class="coloc-meta-value">1er Jan 2025</div>
      </div>
      <div class="coloc-meta-item">
        <div class="coloc-meta-label">Membres</div>
        <div class="coloc-meta-value">4 / ∞</div>
      </div>
      <div class="coloc-meta-item">
        <div class="coloc-meta-label">Rôle</div>
        <div class="coloc-meta-value">Owner</div>
      </div>
    </div>
  </div>

  <!-- Invite link -->
  <div class="invite-box">
    <div class="invite-icon">🔗</div>
    <div class="invite-info">
      <h4>Lien d'invitation</h4>
      <p>Partagez ce lien pour inviter de nouveaux membres</p>
      <span class="invite-link">https://coloc.app/join/abc123tok456xyz</span>
    </div>
    <button class="btn-copy" onclick="this.textContent='✓ Copié!'">Copier</button>
  </div>

  <!-- Members -->
  <div class="card">
    <div class="card-header">
      <div class="card-title">Membres (4)</div>
    </div>
    <table class="members-table">
      <thead>
        <tr>
          <th>Membre</th>
          <th>Rôle</th>
          <th>Réputation</th>
          <th>Solde</th>
          <th>Rejoint le</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><div class="member-cell"><div class="avatar av1">MD</div><div><div class="member-name">Marie Dupont</div><div class="member-email">marie@exemple.fr</div></div></div></td>
          <td><span class="role-tag tag-owner">Owner</span></td>
          <td><div class="rep-badge"><span class="stars">★★★★★</span> 5.0</div></td>
          <td><span class="balance-pos">+47,00 €</span></td>
          <td><span class="joined-date">01/01/2025</span></td>
          <td>—</td>
        </tr>
        <tr>
          <td><div class="member-cell"><div class="avatar av2">LM</div><div><div class="member-name">Lucas Martin</div><div class="member-email">lucas@exemple.fr</div></div></div></td>
          <td><span class="role-tag tag-member">Member</span></td>
          <td><div class="rep-badge"><span class="stars">★★★★☆</span> 4.0</div></td>
          <td><span class="balance-neg">−23,00 €</span></td>
          <td><span class="joined-date">03/01/2025</span></td>
          <td><div class="actions-cell"><button class="btn-kick">Retirer</button></div></td>
        </tr>
        <tr>
          <td><div class="member-cell"><div class="avatar av3">AB</div><div><div class="member-name">Aïcha Benali</div><div class="member-email">aicha@exemple.fr</div></div></div></td>
          <td><span class="role-tag tag-member">Member</span></td>
          <td><div class="rep-badge"><span class="stars">★★★★★</span> 4.8</div></td>
          <td><span class="balance-neg">−12,00 €</span></td>
          <td><span class="joined-date">05/01/2025</span></td>
          <td><div class="actions-cell"><button class="btn-kick">Retirer</button></div></td>
        </tr>
        <tr>
          <td><div class="member-cell"><div class="avatar av4">TD</div><div><div class="member-name">Tom Duval</div><div class="member-email">tom@exemple.fr</div></div></div></td>
          <td><span class="role-tag tag-member">Member</span></td>
          <td><div class="rep-badge"><span class="stars">★★★☆☆</span> 3.0</div></td>
          <td><span class="balance-neg">−12,00 €</span></td>
          <td><span class="joined-date">10/01/2025</span></td>
          <td><div class="actions-cell"><button class="btn-kick">Retirer</button></div></td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Pending Invitations -->
  <div class="card">
    <div class="card-header">
      <div class="card-title">Invitations en attente</div>
    </div>
    <div class="invite-item">
      <div>
        <div class="invite-email">sophie.richard@exemple.fr</div>
        <div style="font-size:0.72rem;color:var(--muted)">Envoyée le 20 fév · expire dans 5 jours</div>
      </div>
      <div style="display:flex;align-items:center;gap:0.75rem">
        <span class="status-pending">En attente</span>
        <button class="btn-revoke">Révoquer</button>
      </div>
    </div>
    <div class="invite-item">
      <div>
        <div class="invite-email">pierre.leroy@exemple.fr</div>
        <div style="font-size:0.72rem;color:var(--muted)">Envoyée le 18 fév · expire dans 3 jours</div>
      </div>
      <div style="display:flex;align-items:center;gap:0.75rem">
        <span class="status-pending">En attente</span>
        <button class="btn-revoke">Révoquer</button>
      </div>
    </div>
  </div>

  <!-- Danger Zone -->
  <div class="danger-zone">
    <h3>⚠️ Zone dangereuse</h3>
    <p>L'annulation de la colocation est irréversible. Tous les membres seront notifiés et les soldes seront calculés avant la clôture.</p>
    <button class="btn-danger-full">Annuler la colocation</button>
  </div>
</main>

<!-- Invite Modal -->
<div class="modal-overlay" id="inviteModal" onclick="if(event.target===this)classList.remove('open')">
  <div class="modal">
    <h3>Inviter un membre</h3>
    <p>Un lien d'invitation sera envoyé à l'adresse email indiquée.</p>
    <div class="field">
      <label>Adresse email</label>
      <input type="email" placeholder="colocataire@exemple.fr">
    </div>
    <div class="modal-actions">
      <button class="btn-cancel" onclick="document.getElementById('inviteModal').classList.remove('open')">Annuler</button>
      <button class="btn-primary" onclick="document.getElementById('inviteModal').classList.remove('open')">Envoyer l'invitation</button>
    </div>
  </div>
</div>
</body>
</html>