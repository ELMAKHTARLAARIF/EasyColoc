<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoLoc — Dashboard Member</title>
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
  --teal: #0F766E;
  --teal-bg: #F0FDFA;
  --teal-border: #99F6E4;
  --red: #B91C1C;
  --red-bg: #FEF2F2;
  --amber: #D97706;
  --violet: #7C3AED;
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
  background: #1E3A3A;
  position: fixed;
  top: 0; left: 0; bottom: 0;
  display: flex;
  flex-direction: column;
  z-index: 20;
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
.logo em { color: #2DD4BF; font-style: normal; }
.coloc-tag {
  font-size: 0.7rem;
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
  color: rgba(255,255,255,0.22);
  padding: 0.5rem 0.75rem 0.4rem;
  margin-top: 0.5rem;
}
.nav-link {
  display: flex;
  align-items: center;
  gap: 0.7rem;
  padding: 0.6rem 0.75rem;
  border-radius: 7px;
  color: rgba(255,255,255,0.48);
  font-size: 0.84rem;
  text-decoration: none;
  transition: all 0.18s;
  margin-bottom: 1px;
  cursor: pointer;
}
.nav-link:hover { background: rgba(255,255,255,0.06); color: rgba(255,255,255,0.85); }
.nav-link.active { background: #0F766E; color: white; }
.nav-icon { width: 16px; text-align: center; font-size: 0.9rem; flex-shrink: 0; }
.nav-tag-readonly {
  margin-left: auto;
  font-size: 0.6rem;
  color: rgba(255,255,255,0.25);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 4px;
  padding: 1px 5px;
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
  background: #0F766E;
  color: white;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.72rem; font-weight: 600;
  flex-shrink: 0;
}
.user-name { color: rgba(255,255,255,0.8); font-size: 0.82rem; font-weight: 500; }
.user-role { color: rgba(255,255,255,0.3); font-size: 0.68rem; margin-top: 1px; }

/* ─── MAIN ─── */
.main {
  margin-left: var(--sidebar-w);
  flex: 1;
  display: flex;
  flex-direction: column;
}
.topbar {
  background: var(--white);
  border-bottom: 1px solid var(--border);
  padding: 1rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky; top: 0; z-index: 10;
}
.topbar-left h1 { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: var(--ink); font-weight: 600; }
.topbar-left p { font-size: 0.78rem; color: var(--muted); margin-top: 1px; }
.topbar-actions { display: flex; gap: 0.75rem; align-items: center; }
.btn { padding: 0.55rem 1.1rem; border-radius: 7px; font-family: 'DM Sans', sans-serif; font-size: 0.82rem; font-weight: 500; cursor: pointer; transition: all 0.18s; }
.btn-outline { background: none; border: 1.5px solid var(--border); color: var(--ink-light); }
.btn-outline:hover { border-color: var(--teal); color: var(--teal); }
.btn-primary { background: var(--teal); border: none; color: white; }
.btn-primary:hover { background: #0D6B63; }
.btn-teal-ghost { background: none; border: 1.5px solid rgba(15,118,110,0.3); color: var(--teal); font-size: 0.78rem; padding: 0.4rem 0.9rem; }
.btn-teal-ghost:hover { background: var(--teal); color: white; }

.page-nav {
  display: flex; gap: 0.4rem; flex-wrap: wrap;
  padding: 0.6rem 2rem;
  background: var(--teal-bg);
  border-bottom: 1px solid var(--teal-border);
}
.page-nav a {
  font-size: 0.72rem; color: var(--teal); text-decoration: none;
  padding: 0.2rem 0.6rem;
  border: 1px solid rgba(15,118,110,0.25);
  border-radius: 20px; transition: all 0.15s;
}
.page-nav a:hover { background: var(--teal); color: white; border-color: var(--teal); }

.content { padding: 1.75rem 2rem; }

/* Member role banner */
.member-banner {
  background: linear-gradient(120deg, #134E4A 0%, #0F766E 60%, #0D9488 100%);
  border-radius: 12px;
  padding: 1.25rem 1.75rem;
  display: flex; align-items: center; gap: 1.5rem;
  margin-bottom: 1.75rem;
  position: relative; overflow: hidden;
}
.member-banner::after {
  content: '🏠';
  position: absolute; right: 1.5rem; top: 50%; transform: translateY(-50%);
  font-size: 4rem; opacity: 0.12;
}
.mb-icon { font-size: 1.75rem; }
.mb-text h2 { font-family: 'Cormorant Garamond', serif; font-size: 1.3rem; color: white; font-weight: 600; }
.mb-text p { font-size: 0.78rem; color: rgba(255,255,255,0.6); margin-top: 0.2rem; }
.mb-actions { margin-left: auto; display: flex; gap: 0.6rem; z-index: 1; }
.btn-wh { background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.25); color: white; }
.btn-wh:hover { background: rgba(255,255,255,0.2); }
.btn-wh-solid { background: white; border: none; color: var(--teal); font-weight: 600; }

/* My personal balance hero */
.my-balance {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 1.5rem;
  display: grid;
  grid-template-columns: 1fr auto;
  gap: 1.5rem;
  align-items: center;
  margin-bottom: 1.25rem;
}
.balance-main {}
.bal-label { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.07em; color: var(--muted); margin-bottom: 0.5rem; }
.bal-amount { font-family: 'Cormorant Garamond', serif; font-size: 3rem; line-height: 1; font-weight: 600; }
.bal-pos { color: var(--teal); }
.bal-neg { color: var(--red); }
.bal-zero { color: var(--muted); }
.bal-sub { font-size: 0.8rem; color: var(--muted); margin-top: 0.4rem; }
.bal-breakdown { display: flex; gap: 2rem; }
.bd-item {}
.bd-label { font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.04em; color: var(--muted); margin-bottom: 0.2rem; }
.bd-val { font-size: 1.1rem; font-weight: 600; color: var(--ink); }

/* Stats row */
.stats-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 1.25rem; }
.stat {
  background: var(--white); border: 1px solid var(--border); border-radius: 10px; padding: 1.25rem;
}
.stat-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem; }
.stat-icon { width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1rem; }
.si-teal { background: #F0FDFA; } .si-amber { background: #FFFBEB; } .si-violet { background: #F5F3FF; }
.stat-trend { font-size: 0.7rem; font-weight: 600; padding: 2px 6px; border-radius: 4px; }
.trend-up { background: #DCFCE7; color: #166534; }
.trend-neutral { background: var(--sand); color: var(--muted); }
.trend-neg { background: #FEE2E2; color: #991B1B; }
.stat-value { font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: var(--ink); line-height: 1; }
.stat-label { font-size: 0.72rem; color: var(--muted); margin-top: 0.3rem; }

/* Grid */
.grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem; }
.grid-main { display: grid; grid-template-columns: 1.4fr 1fr; gap: 1.25rem; }

.panel { background: var(--white); border: 1px solid var(--border); border-radius: 10px; overflow: hidden; }
.panel-head { padding: 1rem 1.25rem; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
.panel-title { font-size: 0.875rem; font-weight: 600; color: var(--ink); }

/* Settlements — what I owe */
.settlement-item {
  display: flex; align-items: center; gap: 1rem;
  padding: 1.1rem 1.25rem;
  border-bottom: 1px solid var(--border);
}
.settlement-item:last-child { border-bottom: none; }
.si-to { display: flex; align-items: center; gap: 0.65rem; flex: 1; }
.si-av { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; font-weight: 700; color: white; flex-shrink: 0; }
.av-a{background:#D97706} .av-b{background:#0F766E} .av-c{background:#BE185D} .av-d{background:#7C3AED}
.si-info {}
.si-name { font-size: 0.84rem; font-weight: 500; color: var(--ink); }
.si-desc { font-size: 0.7rem; color: var(--muted); }
.si-amount { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; color: var(--red); min-width: 80px; text-align: right; }
.si-amount.paid-amt { color: var(--teal); }
.btn-pay {
  padding: 0.5rem 1rem; background: var(--teal); color: white;
  border: none; border-radius: 7px; font-family: 'DM Sans', sans-serif;
  font-size: 0.78rem; font-weight: 500; cursor: pointer; transition: all 0.2s; white-space: nowrap;
}
.btn-pay:hover { background: #0D6B63; }
.btn-paid { background: var(--sand); color: var(--muted); border: 1px solid var(--border); cursor: default; }

/* Expenses readonly */
.expense-row {
  display: grid; grid-template-columns: 8px 1fr auto; gap: 0.85rem;
  align-items: center; padding: 0.85rem 1.25rem;
  border-bottom: 1px solid var(--border); transition: background 0.15s;
}
.expense-row:hover { background: var(--cream); }
.expense-row:last-child { border-bottom: none; }
.e-dot { width: 8px; height: 8px; border-radius: 50%; }
.e-info {}
.e-name { font-size: 0.84rem; font-weight: 500; color: var(--ink); }
.e-meta { font-size: 0.7rem; color: var(--muted); margin-top: 1px; display: flex; align-items: center; gap: 0.5rem; }
.e-share-chip { background: var(--teal-bg); color: var(--teal); border-radius: 4px; font-size: 0.64rem; padding: 1px 5px; font-weight: 600; }
.e-total { font-size: 0.875rem; font-weight: 600; color: var(--ink); text-align: right; }
.e-my-share { font-size: 0.68rem; color: var(--muted); text-align: right; }

/* Members overview */
.member-item {
  display: flex; align-items: center; gap: 0.85rem;
  padding: 0.85rem 1.25rem; border-bottom: 1px solid var(--border);
  transition: background 0.15s;
}
.member-item:hover { background: var(--cream); }
.member-item:last-child { border-bottom: none; }
.mi-av { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; font-weight: 700; color: white; flex-shrink: 0; }
.mi-info { flex: 1; }
.mi-name { font-size: 0.84rem; font-weight: 500; color: var(--ink); display: flex; align-items: center; gap: 0.4rem; }
.mi-rep { font-size: 0.64rem; color: #D97706; margin-top: 2px; }
.mi-bal { font-size: 0.82rem; font-weight: 600; text-align: right; }
.mbal-pos { color: var(--teal); }
.mbal-neg { color: var(--red); }
.mbal-zero { color: var(--muted); }
.tag-owner-sm { font-size: 0.58rem; background: #FFFBEB; color: #D97706; border: 1px solid #FDE68A; padding: 1px 5px; border-radius: 4px; font-weight: 600; }
.tag-you-sm { font-size: 0.58rem; background: var(--teal-bg); color: var(--teal); border: 1px solid var(--teal-border); padding: 1px 5px; border-radius: 4px; font-weight: 600; }

/* Leave zone */
.leave-zone {
  margin: 1rem 1.25rem;
  border: 1.5px solid rgba(185,28,28,0.2);
  border-radius: 8px;
  padding: 1rem;
  background: var(--red-bg);
}
.lz-title { font-size: 0.8rem; font-weight: 600; color: var(--red); margin-bottom: 0.3rem; }
.lz-desc { font-size: 0.72rem; color: #7F1D1D; margin-bottom: 0.75rem; line-height: 1.5; }
.btn-leave { font-size: 0.78rem; padding: 0.45rem 1rem; border: 1.5px solid var(--red); color: var(--red); background: none; border-radius: 7px; cursor: pointer; font-family: 'DM Sans', sans-serif; }
.btn-leave:hover { background: var(--red); color: white; }

/* Anim */
@keyframes fadeUp { from { opacity:0; transform:translateY(8px); } to { opacity:1; transform:translateY(0); } }
.stat { animation: fadeUp 0.35s ease both; }
.stat:nth-child(1){animation-delay:0.05s} .stat:nth-child(2){animation-delay:0.1s} .stat:nth-child(3){animation-delay:0.15s}
.panel, .my-balance, .member-banner { animation: fadeUp 0.4s ease both; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-top">
    <div class="logo">Co<em>Loc</em></div>
    <div class="coloc-tag">Apt. Saint-Michel · Member</div>
  </div>
  <nav class="nav">
    <div class="nav-group-label">Navigation</div>
    <a class="nav-link active"><span class="nav-icon">⊞</span> Dashboard</a>
    <a class="nav-link" href="04-expenses.html"><span class="nav-icon">💶</span> Dépenses <span class="nav-tag-readonly">lecture</span></a>
    <a class="nav-link" href="05-balances.html"><span class="nav-icon">⚖️</span> Balances & Dettes</a>
    <a class="nav-link" href="03-colocation.html"><span class="nav-icon">🏠</span> Membres <span class="nav-tag-readonly">lecture</span></a>

    <div class="nav-group-label">Compte</div>
    <a class="nav-link" href="07-profile.html"><span class="nav-icon">👤</span> Mon profil</a>
  </nav>
  <div class="sidebar-user">
    <div class="user-av">LM</div>
    <div>
      <div class="user-name">Lucas Martin</div>
      <div class="user-role">Member · Apt. Saint-Michel</div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<div class="main">
  <div class="topbar">
    <div class="topbar-left">
      <h1>Dashboard Member</h1>
      <p>Appartement Saint-Michel · Fév 2025</p>
    </div>
    <div class="topbar-actions">
      <a href="08-dashboard-owner.html" class="btn btn-outline">← Vue Owner</a>
      <button class="btn btn-primary" onclick="document.getElementById('addExpModal').style.display='flex'">+ Ajouter une dépense</button>
    </div>
  </div>

  <div class="page-nav">
    <a href="01-auth.html">← Auth</a>
    <a href="08-dashboard-owner.html">← Dashboard Owner</a>
    <a href="04-expenses.html">Dépenses</a>
    <a href="05-balances.html">Balances</a>
    <a href="07-profile.html">Profil</a>
  </div>

  <div class="content">

    <!-- Member banner -->
    <div class="member-banner">
      <div class="mb-icon">🏘️</div>
      <div class="mb-text">
        <h2>Appartement Saint-Michel</h2>
        <p>Membre depuis le 3 jan 2025 · Owner : Marie Dupont · 4 membres actifs</p>
      </div>
      <div class="mb-actions">
        <button class="btn btn-wh" onclick="location.href='05-balances.html'">Voir les remboursements</button>
        <button class="btn btn-wh-solid" onclick="document.getElementById('addExpModal').style.display='flex'">+ Dépense</button>
      </div>
    </div>

    <!-- My personal balance -->
    <div class="my-balance">
      <div class="balance-main">
        <div class="bal-label">Mon solde net ce mois</div>
        <div class="bal-amount bal-neg">−23 €</div>
        <div class="bal-sub">Vous devez rembourser Marie Dupont</div>
      </div>
      <div class="bal-breakdown">
        <div class="bd-item">
          <div class="bd-label">J'ai payé</div>
          <div class="bd-val">94,00 €</div>
        </div>
        <div class="bd-item">
          <div class="bd-label">Ma part totale</div>
          <div class="bd-val">81,00 €</div>
        </div>
        <div class="bd-item">
          <div class="bd-label">Ma réputation</div>
          <div class="bd-val" style="color:#D97706">★ 4.0</div>
        </div>
      </div>
    </div>

    <!-- Stats row -->
    <div class="stats-row">
      <div class="stat">
        <div class="stat-top"><div class="stat-icon si-teal">💶</div><span class="stat-trend trend-neutral">8 dépenses</span></div>
        <div class="stat-value">324 €</div>
        <div class="stat-label">Total colocation ce mois</div>
      </div>
      <div class="stat">
        <div class="stat-top"><div class="stat-icon si-amber">👥</div><span class="stat-trend trend-neutral">4 membres</span></div>
        <div class="stat-value">81 €</div>
        <div class="stat-label">Ma part par mois</div>
      </div>
      <div class="stat">
        <div class="stat-top"><div class="stat-icon si-violet">⭐</div><span class="stat-trend trend-up">+1 récent</span></div>
        <div class="stat-value">4.0</div>
        <div class="stat-label">Score de réputation</div>
      </div>
    </div>

    <!-- Main content -->
    <div class="grid-main">

      <!-- Left -->
      <div style="display:flex;flex-direction:column;gap:1.25rem">

        <!-- What I owe — settlements -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Ce que je dois rembourser</span>
            <a href="05-balances.html" class="btn btn-teal-ghost">Voir tout →</a>
          </div>
          <div>
            <div class="settlement-item">
              <div class="si-to">
                <div class="si-av av-a">MD</div>
                <div class="si-info">
                  <div class="si-name">Marie Dupont</div>
                  <div class="si-desc">Courses + Loyer de février · calculé automatiquement</div>
                </div>
              </div>
              <div class="si-amount">23,00 €</div>
              <button class="btn-pay" onclick="markPaid(this, this.previousElementSibling)">✓ Marquer payé</button>
            </div>
            <div class="settlement-item" style="opacity:0.55">
              <div class="si-to">
                <div class="si-av av-c">AB</div>
                <div class="si-info">
                  <div class="si-name">Aïcha Benali</div>
                  <div class="si-desc">Produits ménagers de janvier</div>
                </div>
              </div>
              <div class="si-amount paid-amt">12,00 €</div>
              <button class="btn-pay btn-paid" disabled>✓ Payé</button>
            </div>
          </div>
        </div>

        <!-- Recent expenses (readonly) -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Dernières dépenses</span>
            <a href="04-expenses.html" class="btn btn-outline" style="font-size:0.75rem;padding:0.35rem 0.75rem">Voir tout →</a>
          </div>
          <div>
            <div class="expense-row">
              <div class="e-dot" style="background:#D97706"></div>
              <div class="e-info">
                <div class="e-name">Courses Monoprix</div>
                <div class="e-meta">18 fév · payé par Marie <span class="e-share-chip">ma part 21,60 €</span></div>
              </div>
              <div><div class="e-total">86,40 €</div><div class="e-my-share">÷ 4</div></div>
            </div>
            <div class="expense-row">
              <div class="e-dot" style="background:#0F766E"></div>
              <div class="e-info">
                <div class="e-name">Facture EDF Février</div>
                <div class="e-meta">15 fév · payé par Lucas (vous) <span class="e-share-chip">votre dépense</span></div>
              </div>
              <div><div class="e-total">94,00 €</div><div class="e-my-share">Vous avez payé</div></div>
            </div>
            <div class="expense-row">
              <div class="e-dot" style="background:#7C3AED"></div>
              <div class="e-info">
                <div class="e-name">Produits ménagers</div>
                <div class="e-meta">12 fév · payé par Aïcha <span class="e-share-chip">ma part 5,88 €</span></div>
              </div>
              <div><div class="e-total">23,50 €</div><div class="e-my-share">÷ 4</div></div>
            </div>
            <div class="expense-row">
              <div class="e-dot" style="background:#D97706"></div>
              <div class="e-info">
                <div class="e-name">Loyer commun</div>
                <div class="e-meta">1 fév · payé par Marie <span class="e-share-chip">ma part 30,00 €</span></div>
              </div>
              <div><div class="e-total">120,00 €</div><div class="e-my-share">÷ 4</div></div>
            </div>
          </div>
        </div>

      </div>

      <!-- Right -->
      <div style="display:flex;flex-direction:column;gap:1.25rem">

        <!-- Members overview -->
        <div class="panel">
          <div class="panel-head">
            <span class="panel-title">Colocataires</span>
          </div>
          <div>
            <div class="member-item">
              <div class="mi-av av-a">MD</div>
              <div class="mi-info">
                <div class="mi-name">Marie Dupont <span class="tag-owner-sm">👑 Owner</span></div>
                <div class="mi-rep">★★★★★</div>
              </div>
              <div class="mi-bal mbal-pos">+47 €</div>
            </div>
            <div class="member-item">
              <div class="mi-av av-b">LM</div>
              <div class="mi-info">
                <div class="mi-name">Lucas Martin <span class="tag-you-sm">Vous</span></div>
                <div class="mi-rep">★★★★☆</div>
              </div>
              <div class="mi-bal mbal-neg">−23 €</div>
            </div>
            <div class="member-item">
              <div class="mi-av av-c">AB</div>
              <div class="mi-info">
                <div class="mi-name">Aïcha Benali</div>
                <div class="mi-rep">★★★★★</div>
              </div>
              <div class="mi-bal mbal-neg">−12 €</div>
            </div>
            <div class="member-item">
              <div class="mi-av av-d">TD</div>
              <div class="mi-info">
                <div class="mi-name">Tom Duval</div>
                <div class="mi-rep">★★★☆☆</div>
              </div>
              <div class="mi-bal mbal-zero">0 €</div>
            </div>
          </div>
        </div>

        <!-- Leave colocation -->
        <div class="panel" style="overflow:visible">
          <div class="panel-head">
            <span class="panel-title">Mon statut</span>
          </div>
          <div style="padding:1rem 1.25rem">
            <div style="font-size:0.78rem;color:var(--muted);margin-bottom:0.5rem">Vous êtes membre de cette colocation depuis le <strong>3 jan 2025</strong>.</div>
            <div style="font-size:0.78rem;color:var(--muted);margin-bottom:1rem">Une seule colocation active est autorisée par utilisateur.</div>
          </div>
          <div class="leave-zone" style="margin-top:0">
            <div class="lz-title">⚠️ Quitter la colocation</div>
            <div class="lz-desc">Si vous avez des dettes en cours, votre réputation sera impactée de −1 lors du départ.</div>
            <button class="btn-leave">Quitter la colocation</button>
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
        <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Payé par</label><select style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none;background:white"><option>Lucas (moi)</option><option>Marie</option><option>Aïcha</option><option>Tom</option></select></div>
      </div>
    </div>
    <div style="display:flex;gap:0.75rem;justify-content:flex-end;margin-top:1.5rem">
      <button class="btn btn-outline" onclick="document.getElementById('addExpModal').style.display='none'">Annuler</button>
      <button class="btn btn-primary" onclick="document.getElementById('addExpModal').style.display='none'">Ajouter</button>
    </div>
  </div>
</div>

<script>
function markPaid(btn, amountEl) {
  btn.textContent = '✓ Payé';
  btn.classList.add('btn-paid');
  btn.disabled = true;
  amountEl.classList.remove('si-amount');
  amountEl.classList.add('si-amount', 'paid-amt');
  btn.closest('.settlement-item').style.opacity = '0.55';
}
</script>
</body>
</html>