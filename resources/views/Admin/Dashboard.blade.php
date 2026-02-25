<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoLoc — Administration</title>
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
  .badge-admin { background: rgba(196,112,74,0.3); color: var(--terracotta-light); border-radius: 4px; padding: 1px 5px; font-size: 0.65rem; }

  .main { margin-left: 240px; flex: 1; padding: 2.5rem; }
  .page-nav { display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1.5rem; }
  .page-nav a { font-size: 0.75rem; color: var(--terracotta); text-decoration: none; padding: 0.25rem 0.6rem; border: 1px solid rgba(196,112,74,0.3); border-radius: 20px; }
  .page-nav a:hover { background: var(--terracotta); color: white; }

  .topbar { margin-bottom: 2rem; }
  .topbar h1 { font-family: 'Playfair Display', serif; font-size: 1.75rem; color: var(--dark); }
  .topbar p { color: var(--muted); font-size: 0.875rem; margin-top: 0.2rem; }

  /* Admin banner */
  .admin-banner {
    background: linear-gradient(135deg, #2A2420 0%, #3D3028 100%);
    border-radius: 14px; padding: 1.5rem 2rem; margin-bottom: 2rem;
    display: flex; align-items: center; gap: 1.25rem;
  }
  .admin-shield { font-size: 2.5rem; }
  .admin-banner h2 { font-family: 'Playfair Display', serif; font-size: 1.25rem; color: white; }
  .admin-banner p { font-size: 0.82rem; color: rgba(255,255,255,0.45); margin-top: 0.25rem; }

  /* Stats grid */
  .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.25rem; margin-bottom: 2rem; }
  .stat-card { background: var(--white); border-radius: 14px; border: 1px solid var(--sand); padding: 1.5rem; position: relative; overflow: hidden; }
  .stat-card::after { content: attr(data-icon); position: absolute; right: 1rem; top: 1rem; font-size: 1.75rem; opacity: 0.12; }
  .stat-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted); margin-bottom: 0.5rem; }
  .stat-value { font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--dark); line-height: 1; }
  .stat-sub { font-size: 0.75rem; color: var(--muted); margin-top: 0.35rem; }
  .stat-up { color: var(--green); font-size: 0.72rem; }
  .stat-down { color: var(--red); font-size: 0.72rem; }

  /* Tabs */
  .tab-bar { display: flex; background: var(--white); border: 1px solid var(--sand); border-radius: 10px; padding: 4px; gap: 2px; margin-bottom: 1.5rem; display: inline-flex; }
  .tab-btn { padding: 0.5rem 1.25rem; border-radius: 7px; border: none; background: none; font-family: 'DM Sans', sans-serif; font-size: 0.875rem; color: var(--muted); cursor: pointer; transition: all 0.2s; }
  .tab-btn.active { background: var(--terracotta); color: white; }

  .card { background: var(--white); border-radius: 14px; border: 1px solid var(--sand); overflow: hidden; }
  .card-header { padding: 1.25rem 1.75rem; border-bottom: 1px solid var(--sand); display: flex; align-items: center; justify-content: space-between; }
  .card-title { font-family: 'Playfair Display', serif; font-size: 1.05rem; color: var(--dark); }
  .search-input { padding: 0.45rem 0.85rem; border: 1.5px solid var(--sand); border-radius: 7px; font-family: 'DM Sans', sans-serif; font-size: 0.82rem; outline: none; }
  .search-input:focus { border-color: var(--terracotta); }

  table { width: 100%; border-collapse: collapse; }
  th { text-align: left; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--muted); padding: 0.85rem 1.5rem; font-weight: 500; border-bottom: 1px solid var(--sand); }
  td { padding: 1rem 1.5rem; border-bottom: 1px solid var(--sand); font-size: 0.875rem; }
  tbody tr:last-child td { border-bottom: none; }
  tbody tr:hover { background: rgba(250,247,242,0.6); }

  .user-cell { display: flex; align-items: center; gap: 0.75rem; }
  .avatar { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.78rem; font-weight: 600; color: white; flex-shrink: 0; }
  .av1{background:#C4704A} .av2{background:#4A9268} .av3{background:#6482C8} .av4{background:#B478C8} .av5{background:#C8885A} .av6{background:#7A8AC8}
  .user-name { font-weight: 500; color: var(--dark); }
  .user-email { font-size: 0.75rem; color: var(--muted); }
  .status-badge { display: inline-flex; align-items: center; gap: 0.35rem; border-radius: 20px; padding: 0.2rem 0.7rem; font-size: 0.73rem; font-weight: 500; }
  .status-active { background: rgba(74,146,104,0.1); color: var(--green); }
  .status-banned { background: rgba(192,74,74,0.1); color: var(--red); }
  .rep-stars { color: var(--terracotta); font-size: 0.75rem; }
  .btn-ban { font-size: 0.75rem; padding: 0.3rem 0.75rem; border: 1.5px solid rgba(192,74,74,0.3); color: var(--red); background: none; border-radius: 6px; cursor: pointer; transition: all 0.2s; }
  .btn-ban:hover { background: var(--red); color: white; }
  .btn-unban { font-size: 0.75rem; padding: 0.3rem 0.75rem; border: 1.5px solid rgba(74,146,104,0.3); color: var(--green); background: none; border-radius: 6px; cursor: pointer; transition: all 0.2s; }
  .btn-unban:hover { background: var(--green); color: white; }

  /* Tab panels */
  .tab-panel { display: none; }
  .tab-panel.active { display: block; }

  /* Colocation table specific */
  .coloc-status { display: inline-flex; align-items: center; gap: 0.3rem; border-radius: 20px; padding: 0.2rem 0.7rem; font-size: 0.73rem; }
  .coloc-active { background: rgba(74,146,104,0.1); color: var(--green); }
  .coloc-cancelled { background: rgba(192,74,74,0.1); color: var(--red); }
</style>
</head>
<body>
<aside class="sidebar">
  <div class="logo">Co<span>Loc</span></div>
  <nav>
    <div class="nav-label">Navigation</div>
    <a class="nav-item" href="02-dashboard.html"><span class="nav-icon">⊞</span> Dashboard</a>
    <a class="nav-item" href="03-colocation.html"><span class="nav-icon">🏠</span> Ma Colocation</a>
    <a class="nav-item" href="04-expenses.html"><span class="nav-icon">💶</span> Dépenses</a>
    <a class="nav-item" href="05-balances.html"><span class="nav-icon">⚖️</span> Balances</a>
    <a class="nav-item" href="07-profile.html"><span class="nav-icon">👤</span> Profil</a>
    <a class="nav-item active" href="06-admin.html"><span class="nav-icon">🛡️</span> Administration</a>
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
    <a href="02-dashboard.html">← Dashboard</a>
    <a href="05-balances.html">← Balances</a>
    <a href="07-profile.html">→ Profil</a>
  </div>

  <div class="topbar">
    <h1>Administration globale</h1>
    <p>Supervision de la plateforme · Accès réservé aux administrateurs</p>
  </div>

  <div class="admin-banner">
    <div class="admin-shield">🛡️</div>
    <div>
      <h2>Tableau de bord administrateur</h2>
      <p>Vous êtes le premier utilisateur inscrit. Vous avez accès à la modération et aux statistiques globales de la plateforme.</p>
    </div>
  </div>

  <!-- Global stats -->
  <div class="stats-grid">
    <div class="stat-card" data-icon="👥">
      <div class="stat-label">Utilisateurs</div>
      <div class="stat-value">47</div>
      <div class="stat-sub"><span class="stat-up">↑ 3 cette semaine</span></div>
    </div>
    <div class="stat-card" data-icon="🏠">
      <div class="stat-label">Colocations actives</div>
      <div class="stat-value">12</div>
      <div class="stat-sub"><span class="stat-up">↑ 1 ce mois</span></div>
    </div>
    <div class="stat-card" data-icon="💶">
      <div class="stat-label">Total dépenses</div>
      <div class="stat-value">8 240 €</div>
      <div class="stat-sub">Depuis le lancement</div>
    </div>
    <div class="stat-card" data-icon="🚫">
      <div class="stat-label">Utilisateurs bannis</div>
      <div class="stat-value">2</div>
      <div class="stat-sub"><span class="stat-down">Compte(s) désactivé(s)</span></div>
    </div>
  </div>

  <!-- Tabs -->
  <div class="tab-bar">
    <button class="tab-btn active" onclick="switchAdminTab('users', this)">Utilisateurs</button>
    <button class="tab-btn" onclick="switchAdminTab('colocations', this)">Colocations</button>
    <button class="tab-btn" onclick="switchAdminTab('banned', this)">Bannis (2)</button>
  </div>

  <!-- Users tab -->
  <div class="tab-panel active" id="tab-users">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Tous les utilisateurs (47)</div>
        <input class="search-input" type="text" placeholder="Rechercher un utilisateur...">
      </div>
      <table>
        <thead>
          <tr>
            <th>Utilisateur</th>
            <th>Rôle</th>
            <th>Réputation</th>
            <th>Colocation</th>
            <th>Inscrit le</th>
            <th>Statut</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div class="user-cell"><div class="avatar av1">MD</div><div><div class="user-name">Marie Dupont</div><div class="user-email">marie@exemple.fr</div></div></div></td>
            <td><span style="font-size:0.72rem;padding:2px 7px;border-radius:4px;background:rgba(196,112,74,0.15);color:var(--terracotta)">Global Admin</span></td>
            <td><span class="rep-stars">★★★★★</span> 5.0</td>
            <td>Apt. Saint-Michel</td>
            <td style="color:var(--muted);font-size:0.8rem">01/01/2025</td>
            <td><span class="status-badge status-active">● Actif</span></td>
            <td>—</td>
          </tr>
          <tr>
            <td><div class="user-cell"><div class="avatar av2">LM</div><div><div class="user-name">Lucas Martin</div><div class="user-email">lucas@exemple.fr</div></div></div></td>
            <td><span style="font-size:0.72rem;padding:2px 7px;border-radius:4px;background:rgba(74,146,104,0.12);color:var(--green)">User</span></td>
            <td><span class="rep-stars">★★★★☆</span> 4.0</td>
            <td>Apt. Saint-Michel</td>
            <td style="color:var(--muted);font-size:0.8rem">03/01/2025</td>
            <td><span class="status-badge status-active">● Actif</span></td>
            <td><button class="btn-ban">Bannir</button></td>
          </tr>
          <tr>
            <td><div class="user-cell"><div class="avatar av3">AB</div><div><div class="user-name">Aïcha Benali</div><div class="user-email">aicha@exemple.fr</div></div></div></td>
            <td><span style="font-size:0.72rem;padding:2px 7px;border-radius:4px;background:rgba(74,146,104,0.12);color:var(--green)">User</span></td>
            <td><span class="rep-stars">★★★★★</span> 4.8</td>
            <td>Apt. Saint-Michel</td>
            <td style="color:var(--muted);font-size:0.8rem">05/01/2025</td>
            <td><span class="status-badge status-active">● Actif</span></td>
            <td><button class="btn-ban">Bannir</button></td>
          </tr>
          <tr>
            <td><div class="user-cell"><div class="avatar av5">PR</div><div><div class="user-name">Paul Renard</div><div class="user-email">paul@exemple.fr</div></div></div></td>
            <td><span style="font-size:0.72rem;padding:2px 7px;border-radius:4px;background:rgba(74,146,104,0.12);color:var(--green)">User</span></td>
            <td><span class="rep-stars">★★☆☆☆</span> 2.1</td>
            <td>Aucune</td>
            <td style="color:var(--muted);font-size:0.8rem">14/02/2025</td>
            <td><span class="status-badge status-active">● Actif</span></td>
            <td><button class="btn-ban">Bannir</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Colocations tab -->
  <div class="tab-panel" id="tab-colocations">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Toutes les colocations (12)</div>
        <input class="search-input" type="text" placeholder="Rechercher...">
      </div>
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Owner</th>
            <th>Membres</th>
            <th>Dépenses totales</th>
            <th>Statut</th>
            <th>Créée le</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="font-weight:500;color:var(--dark)">Apt. Saint-Michel</td>
            <td>Marie Dupont</td>
            <td>4</td>
            <td>324,00 €</td>
            <td><span class="coloc-status coloc-active">● Active</span></td>
            <td style="color:var(--muted);font-size:0.8rem">01/01/2025</td>
          </tr>
          <tr>
            <td style="font-weight:500;color:var(--dark)">Coloc Belleville</td>
            <td>Julie Morin</td>
            <td>3</td>
            <td>1 240,50 €</td>
            <td><span class="coloc-status coloc-active">● Active</span></td>
            <td style="color:var(--muted);font-size:0.8rem">10/11/2024</td>
          </tr>
          <tr>
            <td style="font-weight:500;color:var(--dark)">Résidence des Arts</td>
            <td>Marc Simon</td>
            <td>0</td>
            <td>890,00 €</td>
            <td><span class="coloc-status coloc-cancelled">✕ Annulée</span></td>
            <td style="color:var(--muted);font-size:0.8rem">15/09/2024</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Banned tab -->
  <div class="tab-panel" id="tab-banned">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Comptes bannis (2)</div>
      </div>
      <table>
        <thead>
          <tr>
            <th>Utilisateur</th>
            <th>Réputation</th>
            <th>Banni le</th>
            <th>Raison</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div class="user-cell"><div class="avatar av6">JB</div><div><div class="user-name">Jean Bertrand</div><div class="user-email">jean@exemple.fr</div></div></div></td>
            <td><span class="rep-stars">★☆☆☆☆</span> 1.0</td>
            <td style="color:var(--muted);font-size:0.8rem">10/02/2025</td>
            <td style="font-size:0.8rem;color:var(--muted)">Dettes impayées répétées</td>
            <td><button class="btn-unban">Débannir</button></td>
          </tr>
          <tr>
            <td><div class="user-cell"><div class="avatar" style="background:#AA6060">CL</div><div><div class="user-name">Camille Lefort</div><div class="user-email">camille@exemple.fr</div></div></div></td>
            <td><span class="rep-stars">★☆☆☆☆</span> 0.5</td>
            <td style="color:var(--muted);font-size:0.8rem">20/01/2025</td>
            <td style="font-size:0.8rem;color:var(--muted)">Comportement abusif</td>
            <td><button class="btn-unban">Débannir</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>

<script>
function switchAdminTab(tabId, btn) {
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('tab-' + tabId).classList.add('active');
}
</script>
</body>
</html>