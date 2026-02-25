<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoLoc — Dashboard Owner</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --ink: #1C1917;
  --ink-light: #44403C;
  --muted: #78716C;
  --border: #E7E5E4;
  --sand: #F5F0EB;
  --cream: #FAFAF9;
  --white: #FFFFFF;
  --amber: #B45309;
  --amber-bg: #FFFBEB;
  --amber-border: #FDE68A;
  --teal: #0F766E;
  --teal-bg: #F0FDFA;
  --red: #B91C1C;
  --red-bg: #FEF2F2;
  --sidebar-w: 256px;
}

body {
  font-family: 'DM Sans', sans-serif;
  background: var(--cream);
  color: var(--ink);
  display: flex;
  min-height: 100vh;
}

/* ─── SIDEBAR ─── */
.sidebar {
  width: var(--sidebar-w);
  background: var(--ink);
  position: fixed;
  top: 0; left: 0; bottom: 0;
  display: flex;
  flex-direction: column;
  padding: 0;
  z-index: 20;
  overflow: hidden;
}
.sidebar-top {
  padding: 1.75rem 1.5rem 1.25rem;
  border-bottom: 1px solid rgba(255,255,255,0.07);
}
.logo {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.6rem;
  color: #FAFAF9;
  letter-spacing: -0.01em;
}
.logo em { color: #D97706; font-style: normal; }
.coloc-name {
  font-size: 0.72rem;
  color: rgba(255,255,255,0.35);
  margin-top: 0.4rem;
  letter-spacing: 0.04em;
  text-transform: uppercase;
}
.nav { padding: 1rem 0.75rem; flex: 1; }
.nav-group-label {
  font-size: 0.62rem;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  color: rgba(255,255,255,0.25);
  padding: 0.5rem 0.75rem 0.4rem;
  margin-top: 0.5rem;
}
.nav-link {
  display: flex;
  align-items: center;
  gap: 0.7rem;
  padding: 0.6rem 0.75rem;
  border-radius: 7px;
  color: rgba(255,255,255,0.5);
  font-size: 0.84rem;
  text-decoration: none;
  transition: all 0.18s;
  margin-bottom: 1px;
  cursor: pointer;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
}
.nav-link:hover { background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.85); }
.nav-link.active { background: #D97706; color: white; }
.nav-icon { width: 16px; text-align: center; font-size: 0.9rem; flex-shrink: 0; }
.nav-badge {
  margin-left: auto;
  background: rgba(217,119,6,0.3);
  color: #FCD34D;
  font-size: 0.65rem;
  padding: 1px 6px;
  border-radius: 10px;
  font-weight: 600;
}
.sidebar-user {
  padding: 1rem 1.5rem;
  border-top: 1px solid rgba(255,255,255,0.07);
  display: flex;
  align-items: center;
  gap: 0.75rem;
}
.user-av {
  width: 32px; height: 32px;
  border-radius: 50%;
  background: #D97706;
  color: white;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.72rem; font-weight: 600;
  flex-shrink: 0;
}
.user-name { color: rgba(255,255,255,0.8); font-size: 0.82rem; font-weight: 500; }
.user-role { color: rgba(255,255,255,0.3); font-size: 0.68rem; margin-top: 1px; }
.owner-crown { color: #FBBF24; }

/* ─── MAIN ─── */
.main {
  margin-left: var(--sidebar-w);
  flex: 1;
  display: flex;
  flex-direction: column;
}

/* Top bar */
.topbar {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  padding: 1rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky; top: 0; z-index: 10;
}
.topbar-left h1 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.4rem;
  color: var(--ink);
  font-weight: 600;
}
.topbar-left p { font-size: 0.78rem; color: var(--muted); margin-top: 1px; }
.topbar-actions { display: flex; gap: 0.75rem; align-items: center; }
.btn { padding: 0.55rem 1.1rem; border-radius: 7px; font-family: 'DM Sans', sans-serif; font-size: 0.82rem; font-weight: 500; cursor: pointer; transition: all 0.18s; }
.btn-outline { background: none; border: 1.5px solid var(--border); color: var(--ink-light); }
.btn-outline:hover { border-color: #D97706; color: #D97706; }
.btn-primary { background: #D97706; border: none; color: white; }
.btn-primary:hover { background: #B45309; }
.btn-danger-sm { background: none; border: 1.5px solid rgba(185,28,28,0.25); color: var(--red); font-size: 0.75rem; padding: 0.35rem 0.8rem; }
.btn-danger-sm:hover { background: var(--red); color: white; }

/* Page nav */
.page-nav {
  display: flex; gap: 0.4rem; flex-wrap: wrap;
  padding: 0.6rem 2rem;
  background: var(--sand);
  border-bottom: 1px solid var(--border);
}
.page-nav a {
  font-size: 0.72rem; color: #B45309; text-decoration: none;
  padding: 0.2rem 0.6rem;
  border: 1px solid rgba(180,83,9,0.25);
  border-radius: 20px; transition: all 0.15s;
}
.page-nav a:hover { background: #D97706; color: white; border-color: #D97706; }

/* Content */
.content { padding: 1.75rem 2rem; }

/* Role banner */
.owner-banner {
  background: linear-gradient(120deg, #92400E 0%, #B45309 60%, #D97706 100%);
  border-radius: 12px;
  padding: 1.25rem 1.75rem;
  display: flex; align-items: center; gap: 1.5rem;
  margin-bottom: 1.75rem;
  position: relative; overflow: hidden;
}
.owner-banner::after {
  content: '👑';
  position: absolute; right: 1.5rem; top: 50%; transform: translateY(-50%);
  font-size: 3.5rem; opacity: 0.15;
}
.ob-icon { font-size: 1.75rem; }
.ob-text h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; color: white; font-weight: 600; }
.ob-text p { font-size: 0.78rem; color: rgba(255,255,255,0.65); margin-top: 0.2rem; }
.ob-actions { margin-left: auto; display: flex; gap: 0.6rem; z-index: 1; }
.btn-white { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); color: white; backdrop-filter: blur(4px); }
.btn-white:hover { background: rgba(255,255,255,0.25); }
.btn-white-solid { background: white; border: none; color: #B45309; font-weight: 600; }
.btn-white-solid:hover { background: #FFFBEB; }

/* Stats grid */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
  margin-bottom: 1.75rem;
}
.stat {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 1.25rem;
  transition: box-shadow 0.2s;
}
.stat:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.05); }
.stat-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem; }
.stat-icon { width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; }
.si-amber { background: #FFFBEB; }
.si-teal { background: #F0FDFA; }
.si-rose { background: #FFF1F2; }
.si-violet { background: #F5F3FF; }
.stat-trend { font-size: 0.7rem; font-weight: 600; padding: 2px 6px; border-radius: 4px; }
.trend-up { background: #DCFCE7; color: #166534; }
.trend-down { background: #FEE2E2; color: #991B1B; }
.trend-neutral { background: var(--sand); color: var(--muted); }
.stat-value { font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: var(--ink); line-height: 1; }
.stat-label { font-size: 0.72rem; color: var(--muted); margin-top: 0.3rem; }

/* Two column layout */
.grid-main { display: grid; grid-template-columns: 1fr 340px; gap: 1.25rem; margin-bottom: 1.25rem; }
.grid-bottom { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; }

.panel {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 10px;
  overflow: hidden;
}
.panel-head {
  padding: 1rem 1.25rem;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
}
.panel-title { font-size: 0.875rem; font-weight: 600; color: var(--ink); }
.panel-body { padding: 0; }

/* Owner actions quick panel */
.quick-actions { padding: 0.75rem; display: flex; flex-direction: column; gap: 0.4rem; }
.qa-item {
  display: flex; align-items: center; gap: 0.85rem;
  padding: 0.75rem 1rem;
  border-radius: 8px;
  background: var(--cream);
  border: 1px solid var(--border);
  cursor: pointer; transition: all 0.18s;
  text-decoration: none;
}
.qa-item:hover { background: var(--amber-bg); border-color: var(--amber-border); }
.qa-icon { width: 32px; height: 32px; border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
.qa-text { }
.qa-label { font-size: 0.82rem; font-weight: 500; color: var(--ink); }
.qa-desc { font-size: 0.7rem; color: var(--muted); }

/* Members list */
.member-row {
  display: flex; align-items: center; gap: 0.85rem;
  padding: 0.85rem 1.25rem;
  border-bottom: 1px solid var(--border);
  transition: background 0.15s;
}
.member-row:last-child { border-bottom: none; }
.member-row:hover { background: var(--cream); }
.m-av {
  width: 36px; height: 36px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.75rem; font-weight: 700; color: white; flex-shrink: 0;
}
.av-amber{background:#D97706} .av-teal{background:#0F766E} .av-rose{background:#BE185D} .av-violet{background:#7C3AED} .av-slate{background:#475569}
.m-info { flex: 1; min-width: 0; }
.m-name { font-size: 0.84rem; font-weight: 500; color: var(--ink); display: flex; align-items: center; gap: 0.5rem; }
.m-date { font-size: 0.7rem; color: var(--muted); }
.m-balance { text-align: right; }
.m-bal-val { font-size: 0.875rem; font-weight: 600; }
.bal-pos { color: var(--teal); }
.bal-neg { color: var(--red); }
.bal-zero { color: var(--muted); }
.m-rep { font-size: 0.65rem; color: #D97706; }
.tag-owner { background: #FFFBEB; color: #D97706; border: 1px solid #FDE68A; font-size: 0.62rem; padding: 1px 6px; border-radius: 4px; font-weight: 600; }
.tag-member { background: var(--teal-bg); color: var(--teal); border: 1px solid rgba(15,118,110,0.2); font-size: 0.62px; padding: 1px 5px; border-radius: 4px; font-size: 0.62rem; }

/* Expense table */
.expense-row {
  display: grid;
  grid-template-columns: 32px 1fr auto auto;
  gap: 0.75rem;
  align-items: center;
  padding: 0.85rem 1.25rem;
  border-bottom: 1px solid var(--border);
  transition: background 0.15s;
}
.expense-row:last-child { border-bottom: none; }
.expense-row:hover { background: var(--cream); }
.e-cat-dot { width: 8px; height: 8px; border-radius: 50%; }
.e-info { }
.e-name { font-size: 0.84rem; font-weight: 500; color: var(--ink); }
.e-meta { font-size: 0.7rem; color: var(--muted); margin-top: 1px; }
.e-amount { font-size: 0.875rem; font-weight: 600; color: var(--ink); text-align: right; }
.e-payer { }
.payer-chip { display: inline-flex; align-items: center; gap: 0.3rem; background: var(--sand); border-radius: 20px; padding: 0.15rem 0.55rem; font-size: 0.68rem; color: var(--ink-light); }
.p-dot { width: 14px; height: 14px; border-radius: 50%; color: white; display: flex; align-items: center; justify-content: center; font-size: 0.5rem; font-weight: 800; }

/* Invitations panel */
.invite-row {
  display: flex; align-items: center; justify-content: space-between;
  padding: 0.85rem 1.25rem;
  border-bottom: 1px solid var(--border);
}
.invite-row:last-child { border-bottom: none; }
.inv-email { font-size: 0.82rem; color: var(--ink); font-weight: 500; }
.inv-meta { font-size: 0.7rem; color: var(--muted); margin-top: 1px; }
.inv-badge { font-size: 0.68rem; padding: 2px 7px; border-radius: 20px; background: #FFFBEB; color: #D97706; border: 1px solid #FDE68A; }
.btn-revoke { font-size: 0.7rem; padding: 0.2rem 0.6rem; border: 1px solid var(--border); border-radius: 5px; background: none; color: var(--muted); cursor: pointer; }
.btn-revoke:hover { border-color: var(--red); color: var(--red); }

/* Cancel zone */
.cancel-zone {
  margin: 0 1.25rem 1.25rem;
  border: 1.5px solid rgba(185,28,28,0.2);
  border-radius: 8px;
  padding: 1rem;
  background: var(--red-bg);
}
.cz-title { font-size: 0.8rem; font-weight: 600; color: var(--red); margin-bottom: 0.3rem; }
.cz-desc { font-size: 0.72rem; color: #7F1D1D; margin-bottom: 0.75rem; line-height: 1.5; }

/* Animations */
@keyframes fadeUp { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }
.stat { animation: fadeUp 0.4s ease both; }
.stat:nth-child(1){animation-delay:0.05s} .stat:nth-child(2){animation-delay:0.1s}
.stat:nth-child(3){animation-delay:0.15s} .stat:nth-child(4){animation-delay:0.2s}
.owner-banner { animation: fadeUp 0.35s ease both; }
.panel { animation: fadeUp 0.45s ease both; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-top">
    <div class="logo">Co<em>Loc</em></div>
    <div class="coloc-name">Apt. Saint-Michel · Owner</div>
  </div>
  <nav class="nav">
    <div class="nav-group-label">Général</div>
    <a class="nav-link active"><span class="nav-icon">⊞</span> Dashboard</a>
    <a class="nav-link" href="03-colocation.html"><span class="nav-icon">🏠</span> Ma Colocation</a>
    <a class="nav-link" href="04-expenses.html"><span class="nav-icon">💶</span> Dépenses</a>
    <a class="nav-link" href="05-balances.html"><span class="nav-icon">⚖️</span> Balances & Dettes</a>

    <div class="nav-group-label">Owner</div>
    <a class="nav-link" href="03-colocation.html"><span class="nav-icon">👥</span> Gérer les membres <span class="nav-badge">4</span></a>
    <a class="nav-link" href="03-colocation.html"><span class="nav-icon">✉️</span> Invitations <span class="nav-badge">2</span></a>
    <a class="nav-link" href="04-expenses.html"><span class="nav-icon">🏷️</span> Catégories</a>

    <div class="nav-group-label">Compte</div>
    <a class="nav-link" href="07-profile.html"><span class="nav-icon">👤</span> Mon profil</a>
    <a class="nav-link" href="06-admin.html"><span class="nav-icon">🛡️</span> Administration</a>
  </nav>
  <div class="sidebar-user">
    <div class="user-av">MD</div>
    <div>
      <div class="user-name">Marie Dupont <span class="owner-crown">👑</span></div>
      <div class="user-role">Owner · Global Admin</div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<div class="main">
  <!-- Topbar -->
  <div class="topbar">
    <div class="topbar-left">
      <h1>Dashboard Owner</h1>
      <p>Appartement Saint-Michel · Fév 2025</p>
    </div>
    <div class="topbar-actions">
      <a href="08-dashboard-member.html" class="btn btn-outline">Voir vue Member →</a>
      <button class="btn btn-outline" onclick="location.href='03-colocation.html'">✉️ Inviter</button>
      <button class="btn btn-primary" onclick="document.getElementById('addExpModal').style.display='flex'">+ Dépense</button>
    </div>
  </div>

  <!-- Page nav -->
  <div class="page-nav">
    <a href="01-auth.html">← Auth</a>
    <a href="03-colocation.html">Colocation</a>
    <a href="04-expenses.html">Dépenses</a>
    <a href="05-balances.html">Balances</a>
    <a href="06-admin.html">Admin</a>
    <a href="07-profile.html">Profil</a>
    <a href="08-dashboard-member.html">→ Dashboard Member</a>
  </div>

  <div class="content">

    <!-- Owner banner -->
    <div class="owner-banner">
      <div class="ob-icon">👑</div>
      <div class="ob-text">
        <h2>Appartement Saint-Michel</h2>
        <p>Vous administrez cette colocation · 4 membres actifs · Créée le 1er jan 2025</p>
      </div>
      <div class="ob-actions">
        <button class="btn btn-white" onclick="location.href='03-colocation.html'">Gérer les membres</button>
        <button class="btn btn-white-solid" onclick="location.href='04-expenses.html'">Voir les dépenses</button>
      </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
      <div class="stat">
        <div class="stat-top">
          <div class="stat-icon si-amber">💶</div>
          <span class="stat-trend trend-up">+12%</span>
        </div>
        <div class="stat-value">324 €</div>
        <div class="stat-label">Dépenses ce mois</div>
      </div>
      <div class="stat">
        <div class="stat-top">
          <div class="stat-icon si-teal">⚖️</div>
          <span class="stat-trend trend-down">3 dettes</span>
        </div>
        <div class="stat-value">+47 €</div>
        <div class="stat-label">Votre solde net</div>
      </div>
      <div class="stat">
        <div class="stat-top">
          <div class="stat-icon si-violet">👥</div>
          <span class="stat-trend trend-neutral">stable</span>
        </div>
        <div class="stat-value">4</div>
        <div class="stat-label">Membres actifs</div>
      </div>
      <div class="stat">
        <div class="stat-top">
          <div class="stat-icon si-rose">⭐</div>
          <span class="stat-trend trend-up">+1</span>
        </div>
        <div class="stat-value">4.8</div>
        <div class="stat-label">Votre réputation</div>
      </div>
    </div>

    <!-- Main grid -->
    <div class="grid-main">

      <!-- Left: Members + expenses -->
      <div style="display:flex;flex-direction:column;gap:1.25rem">

        <!-- Members -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Membres de la colocation</span>
            <button class="btn btn-outline" style="font-size:0.75rem;padding:0.35rem 0.75rem" onclick="location.href='03-colocation.html'">Gérer →</button>
          </div>
          <div class="panel-body">
            <div class="member-row">
              <div class="m-av av-amber">MD</div>
              <div class="m-info">
                <div class="m-name">Marie Dupont <span class="tag-owner">👑 Owner</span></div>
                <div class="m-rep">★★★★★ · Rejoint le 01/01/2025</div>
              </div>
              <div class="m-balance"><div class="m-bal-val bal-pos">+47,00 €</div><div style="font-size:0.65rem;color:var(--muted);text-align:right">Vous</div></div>
            </div>
            <div class="member-row">
              <div class="m-av av-teal">LM</div>
              <div class="m-info">
                <div class="m-name">Lucas Martin <span class="tag-member">Member</span></div>
                <div class="m-rep">★★★★☆ · Rejoint le 03/01/2025</div>
              </div>
              <div class="m-balance"><div class="m-bal-val bal-neg">−23,00 €</div><div style="font-size:0.65rem;color:var(--muted);text-align:right">doit payer</div></div>
            </div>
            <div class="member-row">
              <div class="m-av av-rose">AB</div>
              <div class="m-info">
                <div class="m-name">Aïcha Benali <span class="tag-member">Member</span></div>
                <div class="m-rep">★★★★★ · Rejoint le 05/01/2025</div>
              </div>
              <div class="m-balance"><div class="m-bal-val bal-neg">−12,00 €</div><div style="font-size:0.65rem;color:var(--muted);text-align:right">doit payer</div></div>
            </div>
            <div class="member-row">
              <div class="m-av av-violet">TD</div>
              <div class="m-info">
                <div class="m-name">Tom Duval <span class="tag-member">Member</span></div>
                <div class="m-rep">★★★☆☆ · Rejoint le 10/01/2025</div>
              </div>
              <div class="m-balance"><div class="m-bal-val bal-zero">0,00 €</div><div style="font-size:0.65rem;color:var(--muted);text-align:right">soldé</div></div>
            </div>
          </div>
        </div>

        <!-- Expenses -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Dernières dépenses</span>
            <button class="btn btn-outline" style="font-size:0.75rem;padding:0.35rem 0.75rem" onclick="location.href='04-expenses.html'">Tout voir →</button>
          </div>
          <div class="panel-body">
            <div class="expense-row">
              <div class="e-cat-dot" style="background:#D97706"></div>
              <div class="e-info"><div class="e-name">Courses Monoprix</div><div class="e-meta">Alimentation · 18 fév</div></div>
              <div class="e-amount">86,40 €</div>
              <div class="e-payer"><div class="payer-chip"><div class="p-dot av-amber">M</div> Marie</div></div>
            </div>
            <div class="expense-row">
              <div class="e-cat-dot" style="background:#0F766E"></div>
              <div class="e-info"><div class="e-name">Facture EDF Février</div><div class="e-meta">Énergie · 15 fév</div></div>
              <div class="e-amount">94,00 €</div>
              <div class="e-payer"><div class="payer-chip"><div class="p-dot av-teal">L</div> Lucas</div></div>
            </div>
            <div class="expense-row">
              <div class="e-cat-dot" style="background:#7C3AED"></div>
              <div class="e-info"><div class="e-name">Produits ménagers</div><div class="e-meta">Entretien · 12 fév</div></div>
              <div class="e-amount">23,50 €</div>
              <div class="e-payer"><div class="payer-chip"><div class="p-dot av-rose">A</div> Aïcha</div></div>
            </div>
            <div class="expense-row">
              <div class="e-cat-dot" style="background:#D97706"></div>
              <div class="e-info"><div class="e-name">Loyer commun (charges)</div><div class="e-meta">Logement · 1 fév</div></div>
              <div class="e-amount">120,00 €</div>
              <div class="e-payer"><div class="payer-chip"><div class="p-dot av-amber">M</div> Marie</div></div>
            </div>
          </div>
        </div>

      </div>

      <!-- Right: Owner actions + invites + cancel -->
      <div style="display:flex;flex-direction:column;gap:1.25rem">

        <!-- Owner quick actions -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Actions Owner</span>
          </div>
          <div class="quick-actions">
            <a class="qa-item" href="03-colocation.html">
              <div class="qa-icon si-amber">✉️</div>
              <div class="qa-text"><div class="qa-label">Inviter un membre</div><div class="qa-desc">Envoyer un lien d'invitation</div></div>
            </a>
            <a class="qa-item" href="03-colocation.html">
              <div class="qa-icon si-teal">👤</div>
              <div class="qa-text"><div class="qa-label">Retirer un membre</div><div class="qa-desc">Gérer les membres actifs</div></div>
            </a>
            <a class="qa-item" href="04-expenses.html">
              <div class="qa-icon si-violet">🏷️</div>
              <div class="qa-text"><div class="qa-label">Gérer les catégories</div><div class="qa-desc">Créer, modifier, supprimer</div></div>
            </a>
            <a class="qa-item" href="05-balances.html">
              <div class="qa-icon si-rose">⚖️</div>
              <div class="qa-text"><div class="qa-label">Voir les remboursements</div><div class="qa-desc">Qui doit à qui</div></div>
            </a>
          </div>
        </div>

        <!-- Pending invitations -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Invitations en attente</span>
            <span style="font-size:0.7rem;background:#FFFBEB;color:#D97706;border:1px solid #FDE68A;padding:2px 8px;border-radius:10px;font-weight:600">2</span>
          </div>
          <div class="panel-body">
            <div class="invite-row">
              <div>
                <div class="inv-email">sophie.r@exemple.fr</div>
                <div class="inv-meta">Envoyée il y a 2j · expire dans 5j</div>
              </div>
              <div style="display:flex;gap:0.5rem;align-items:center">
                <span class="inv-badge">En attente</span>
                <button class="btn-revoke">✕</button>
              </div>
            </div>
            <div class="invite-row">
              <div>
                <div class="inv-email">pierre.l@exemple.fr</div>
                <div class="inv-meta">Envoyée il y a 4j · expire dans 3j</div>
              </div>
              <div style="display:flex;gap:0.5rem;align-items:center">
                <span class="inv-badge">En attente</span>
                <button class="btn-revoke">✕</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Cancel zone -->
        <div class="panel" style="overflow:visible">
          <div class="panel-head">
            <span class="panel-title" style="color:var(--red)">⚠️ Zone Owner</span>
          </div>
          <div style="padding:1rem 1.25rem 1.25rem">
            <div class="cancel-zone">
              <div class="cz-title">Annuler la colocation</div>
              <div class="cz-desc">Cette action est irréversible. Tous les membres seront informés et les scores de réputation seront calculés.</div>
              <button class="btn btn-danger-sm">Annuler la colocation</button>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<!-- Add Expense Modal -->
<div id="addExpModal" style="display:none;position:fixed;inset:0;background:rgba(28,25,23,0.6);z-index:100;align-items:center;justify-content:center" onclick="if(event.target===this)this.style.display='none'">
  <div style="background:white;border-radius:14px;padding:2rem;width:460px;max-width:90vw">
    <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.4rem;margin-bottom:0.4rem">Ajouter une dépense</h3>
    <p style="font-size:0.82rem;color:var(--muted);margin-bottom:1.5rem">Partagée entre tous les membres de la colocation.</p>
    <div style="display:grid;gap:1rem">
      <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Titre</label><input type="text" placeholder="Ex: Courses, EDF..." style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none"></div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
        <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Montant €</label><input type="number" placeholder="0.00" style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none"></div>
        <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Date</label><input type="date" value="2025-02-25" style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none"></div>
      </div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem">
        <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Catégorie</label><select style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none;background:white"><option>Alimentation</option><option>Énergie</option><option>Entretien</option><option>Logement</option><option>Autre</option></select></div>
        <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Payé par</label><select style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none;background:white"><option>Marie (moi)</option><option>Lucas</option><option>Aïcha</option><option>Tom</option></select></div>
      </div>
    </div>
    <div style="display:flex;gap:0.75rem;justify-content:flex-end;margin-top:1.5rem">
      <button class="btn btn-outline" onclick="document.getElementById('addExpModal').style.display='none'">Annuler</button>
      <button class="btn btn-primary" onclick="document.getElementById('addExpModal').style.display='none'">Ajouter</button>
    </div>
  </div>
</div>

</body>
</html>