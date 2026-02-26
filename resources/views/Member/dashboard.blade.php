<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoLoc — Dashboard Member</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
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
          <div class="stat-top">
            <div class="stat-icon si-teal">💶</div><span class="stat-trend trend-neutral">8 dépenses</span>
          </div>
          <div class="stat-value">324 €</div>
          <div class="stat-label">Total colocation ce mois</div>
        </div>
        <div class="stat">
          <div class="stat-top">
            <div class="stat-icon si-amber">👥</div><span class="stat-trend trend-neutral">4 membres</span>
          </div>
          <div class="stat-value">81 €</div>
          <div class="stat-label">Ma part par mois</div>
        </div>
        <div class="stat">
          <div class="stat-top">
            <div class="stat-icon si-violet">⭐</div><span class="stat-trend trend-up">+1 récent</span>
          </div>
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
                <div>
                  <div class="e-total">86,40 €</div>
                  <div class="e-my-share">÷ 4</div>
                </div>
              </div>
              <div class="expense-row">
                <div class="e-dot" style="background:#0F766E"></div>
                <div class="e-info">
                  <div class="e-name">Facture EDF Février</div>
                  <div class="e-meta">15 fév · payé par Lucas (vous) <span class="e-share-chip">votre dépense</span></div>
                </div>
                <div>
                  <div class="e-total">94,00 €</div>
                  <div class="e-my-share">Vous avez payé</div>
                </div>
              </div>
              <div class="expense-row">
                <div class="e-dot" style="background:#7C3AED"></div>
                <div class="e-info">
                  <div class="e-name">Produits ménagers</div>
                  <div class="e-meta">12 fév · payé par Aïcha <span class="e-share-chip">ma part 5,88 €</span></div>
                </div>
                <div>
                  <div class="e-total">23,50 €</div>
                  <div class="e-my-share">÷ 4</div>
                </div>
              </div>
              <div class="expense-row">
                <div class="e-dot" style="background:#D97706"></div>
                <div class="e-info">
                  <div class="e-name">Loyer commun</div>
                  <div class="e-meta">1 fév · payé par Marie <span class="e-share-chip">ma part 30,00 €</span></div>
                </div>
                <div>
                  <div class="e-total">120,00 €</div>
                  <div class="e-my-share">÷ 4</div>
                </div>
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
          <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Catégorie</label><select style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none;background:white">
              <option>Alimentation</option>
              <option>Énergie</option>
              <option>Entretien</option>
              <option>Logement</option>
              <option>Autre</option>
            </select></div>
          <div><label style="display:block;font-size:0.72rem;text-transform:uppercase;letter-spacing:0.05em;color:var(--ink);margin-bottom:0.35rem;font-weight:500">Payé par</label><select style="width:100%;padding:0.7rem 1rem;border:1.5px solid var(--border);border-radius:8px;font-family:'DM Sans',sans-serif;font-size:0.9rem;outline:none;background:white">
              <option>Lucas (moi)</option>
              <option>Marie</option>
              <option>Aïcha</option>
              <option>Tom</option>
            </select></div>
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

  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Modal Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Trigger button (demo) -->

    <!-- ═══════ MODAL ═══════ -->
    <div
      id="inviteModal"
      class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4"
      onclick="if(event.target===this)this.classList.add('hidden')">
      <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">

        <!-- Header -->
        <div class="flex items-start justify-between p-6 border-b border-gray-100">
          <div>
            <h3 class="font-semibold text-gray-900 text-lg">Inviter un membre</h3>
            <p class="text-sm text-gray-400 mt-0.5">Apt. Saint-Michel</p>
          </div>
          <button
            onclick="document.getElementById('inviteModal').classList.add('hidden')"
            class="text-gray-300 hover:text-gray-500 text-xl leading-none transition-colors mt-0.5">✕</button>
        </div>

        <!-- Form -->
        <form class="p-6 flex flex-col gap-4" onsubmit="handleSubmit(event)">

          <!-- Email -->
          <div>
            <label for="invite_email" class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">
              Adresse email <span class="text-amber-600">*</span>
            </label>
            <input
              type="email"
              id="invite_email"
              name="email"
              placeholder="prenom.nom@exemple.fr"
              required
              class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-900 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 transition-all">
            <p id="email-error" class="text-xs text-red-500 mt-1 hidden"></p>
          </div>

          <!-- Message -->
          <div>
            <label for="invite_message" class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">
              Message <span class="text-gray-300 font-normal normal-case tracking-normal">· facultatif</span>
            </label>
            <textarea
              id="invite_message"
              name="message"
              rows="3"
              maxlength="300"
              placeholder="Ex: Salut ! Je t'invite dans notre coloc…"
              class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-gray-900 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 transition-all resize-none leading-relaxed"></textarea>
          </div>

          <!-- Info -->
          <div class="flex items-start gap-2.5 bg-amber-50 border border-amber-100 rounded-xl px-4 py-3">
            <span class="text-amber-500 text-sm mt-px">🔗</span>
            <p class="text-xs text-amber-800 leading-relaxed">
              Un lien d'invitation valable <strong>7 jours</strong> sera envoyé à cette adresse.
            </p>
          </div>

          <!-- Actions -->
          <div class="flex gap-3 pt-1">
            <button
              type="button"
              onclick="document.getElementById('inviteModal').classList.add('hidden')"
              class="flex-1 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-500 hover:border-gray-300 hover:text-gray-700 transition-all">Annuler</button>
            <button
              type="submit"
              id="submit-btn"
              class="flex-1 py-2.5 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold transition-all">✉️ Envoyer</button>
          </div>

        </form>

        <!-- Pending invitations -->
        <div class="border-t border-gray-100 px-6 py-4">
          <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-3">En attente (2)</p>
          <div class="flex flex-col gap-3">
            <div class="flex items-center justify-between">
              <div>
                <div class="text-sm text-gray-800">sophie.r@exemple.fr</div>
                <div class="text-xs text-gray-400">expire dans 5j</div>
              </div>
              <button
                onclick="this.closest('div.flex').remove()"
                class="text-xs text-gray-300 hover:text-red-500 border border-gray-200 hover:border-red-300 rounded-lg px-2.5 py-1 transition-all">Révoquer</button>
            </div>
            <div class="flex items-center justify-between">
              <div>
                <div class="text-sm text-gray-800">pierre.l@exemple.fr</div>
                <div class="text-xs text-gray-400">expire dans 3j</div>
              </div>
              <button
                onclick="this.closest('div.flex').remove()"
                class="text-xs text-gray-300 hover:text-red-500 border border-gray-200 hover:border-red-300 rounded-lg px-2.5 py-1 transition-all">Révoquer</button>
            </div>
          </div>
        </div>

      </div>
    </div>

</body>
</html>