<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoLoc — Dashboard Owner</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Cormorant Garamond', 'serif'],
            body: ['DM Sans', 'sans-serif'],
          },
          colors: {
            ink: {
              DEFAULT: '#1C1917',
              light: '#44403C'
            },
            muted: '#78716C',
            sand: '#F5F0EB',
            cream: '#FAFAF9',
            amber: {
              DEFAULT: '#D97706',
              dark: '#B45309',
              light: '#FFFBEB',
              border: '#FDE68A'
            },
            teal: {
              DEFAULT: '#0F766E',
              light: '#F0FDFA'
            },
            rose: {
              DEFAULT: '#BE185D',
              light: '#FFF1F2'
            },
            violet: {
              DEFAULT: '#7C3AED',
              light: '#F5F3FF'
            },
          },
          animation: {
            'fade-up': 'fadeUp 0.4s ease both',
          },
          keyframes: {
            fadeUp: {
              from: {
                opacity: '0',
                transform: 'translateY(10px)'
              },
              to: {
                opacity: '1',
                transform: 'translateY(0)'
              },
            }
          }
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'DM Sans', sans-serif;
    }

    .font-display {
      font-family: 'Cormorant Garamond', serif;
    }

    input,
    select,
    textarea {
      font-family: 'DM Sans', sans-serif;
    }

    input:focus,
    select:focus {
      outline: none;
      border-color: #D97706 !important;
      box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
    }

    .delay-1 {
      animation-delay: 0.05s;
    }

    .delay-2 {
      animation-delay: 0.10s;
    }

    .delay-3 {
      animation-delay: 0.15s;
    }

    .delay-4 {
      animation-delay: 0.20s;
    }
  </style>
</head>

<body class="bg-cream text-ink flex min-h-screen">

  <!-- ════════ SIDEBAR ════════ -->
  <aside class="w-64 bg-ink fixed top-0 left-0 bottom-0 flex flex-col z-20">

    <!-- Top -->
    <div class="px-6 py-7 border-b border-white/[0.07]">
      <div class="font-display text-[1.6rem] text-cream tracking-tight">
        Co<em class="not-italic text-amber">Loc</em>
      </div>
      <div class="text-[0.68rem] text-white/35 mt-1.5 uppercase tracking-wider">
        {{ Auth::user()->name }} · Owner
      </div>
    </div>

    <!-- Nav -->
    <nav class="flex-1 px-3 py-4 space-y-0.5">
      <div class="text-[0.6rem] uppercase tracking-[0.12em] text-white/25 px-3 pt-2 pb-1">Navigation</div>

      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-amber text-white text-sm font-medium">
        <span class="w-4 text-center">⊞</span> Dashboard
      </a>
      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">💶</span> Dépenses
      </a>
      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">⚖️</span> Balances
      </a>

      <div class="text-[0.6rem] uppercase tracking-[0.12em] text-white/25 px-3 pt-4 pb-1">Gestion Owner</div>

      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">👥</span> Membres
        <span class="ml-auto text-[0.62rem] font-semibold bg-amber/30 text-amber-200 px-1.5 py-0.5 rounded-full">4</span>
      </a>
      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">✉️</span> Invitations
        <span class="ml-auto text-[0.62rem] font-semibold bg-amber/30 text-amber-200 px-1.5 py-0.5 rounded-full">2</span>
      </a>
      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">🏷️</span> Catégories
      </a>

      <div class="text-[0.6rem] uppercase tracking-[0.12em] text-white/25 px-3 pt-4 pb-1">Compte</div>

      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">👤</span> Mon profil
      </a>
      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">🛡️</span> Administration
      </a>
    </nav>

    <!-- User -->
    <div class="px-5 py-4 border-t border-white/[0.07] flex items-center gap-3">
      <div class="w-8 h-8 rounded-full bg-amber flex items-center justify-center text-white text-xs font-semibold flex-shrink-0">MD</div>
      <div>
        <div class="text-white/80 text-sm font-medium">Marie Dupont</div>
        <div class="text-white/30 text-[0.65rem] mt-0.5">👑 Owner · Global Admin</div>
      </div>
    </div>
  </aside>

  <!-- ════════ MAIN ════════ -->
  <div class="ml-64 flex-1 flex flex-col min-h-screen">

    <!-- Topbar -->
    <header class="bg-white border-b border-stone-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
      <div>
        <h1 class="font-display text-[1.4rem] font-semibold text-ink leading-tight">Dashboard Owner</h1>
        <p class="text-sm text-muted mt-0.5">{{ $colocation->name }} · Créée le {{ $colocation->created_at->format('d M Y') }}</p>
      </div>
      <div class="flex items-center gap-3">
        <button
          class="text-sm text-ink-light border border-stone-200 rounded-lg px-4 py-2 hover:border-amber hover:text-amber transition-all"
          onclick="document.getElementById('inviteModal').classList.remove('hidden')">✉️ Inviter</button>
        <button
          class="text-sm bg-amber hover:bg-amber-dark text-white font-medium rounded-lg px-4 py-2 transition-all"
          onclick="document.getElementById('expModal').classList.remove('hidden')">+ Dépense</button>
      </div>
    </header>

    <!-- Content -->
    <main class="p-8 flex flex-col gap-6">

      <!-- Owner Banner -->
      <div class="animate-fade-up relative overflow-hidden rounded-xl px-7 py-5 flex items-center gap-6"
        style="background: linear-gradient(120deg, #92400E 0%, #B45309 60%, #D97706 100%)">
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-6xl opacity-[0.14] pointer-events-none">👑</div>
        <div class="text-3xl">👑</div>
        <div>
          <h2 class="font-display text-[1.3rem] font-semibold text-white leading-tight">{{ $colocation->name }}</h2>
          <p class="text-sm text-white/60 mt-0.5">Vous administrez cette colocation · {{ $ColorMembers->count() }} membres actifs · Créée le {{ $colocation->created_at->format('d M Y') }}</p>
        </div>
        <div class="ml-auto flex gap-2.5 z-10 flex-shrink-0">
          <button class="text-sm px-4 py-2 rounded-lg bg-white/15 border border-white/30 text-white hover:bg-white/25 transition-all">Gérer les membres</button>
          <button class="text-sm px-4 py-2 rounded-lg bg-white text-amber-dark font-semibold hover:bg-amber-light transition-all">Voir les dépenses</button>
        </div>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-4 gap-4">
        <div class="animate-fade-up delay-1 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-amber-light flex items-center justify-center text-base">💶</div>
            <span class="text-[0.68rem] font-semibold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">+12%</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">324 €</div>
          <div class="text-xs text-muted mt-1">Dépenses ce mois</div>
        </div>
        <div class="animate-fade-up delay-2 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-teal-light flex items-center justify-center text-base">⚖️</div>
            <span class="text-[0.68rem] font-semibold bg-red-100 text-red-700 px-1.5 py-0.5 rounded">3 dettes</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">+47 €</div>
          <div class="text-xs text-muted mt-1">Votre solde net</div>
        </div>
        <div class="animate-fade-up delay-3 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-violet-light flex items-center justify-center text-base">👥</div>
            <span class="text-[0.68rem] font-semibold bg-sand text-muted px-1.5 py-0.5 rounded">stable</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">4</div>
          <div class="text-xs text-muted mt-1">Membres actifs</div>
        </div>
        <div class="animate-fade-up delay-4 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-rose-light flex items-center justify-center text-base">⭐</div>
            <span class="text-[0.68rem] font-semibold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">+1</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">4.8</div>
          <div class="text-xs text-muted mt-1">Votre réputation</div>
        </div>
      </div>

      <!-- Main grid -->
      <div class="grid grid-cols-[1fr_320px] gap-5">

        <!-- LEFT -->
        <div class="flex flex-col gap-5">

          <!-- Members -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-ink">Membres de la colocation</span>
              <button class="text-xs text-ink-light border border-stone-200 rounded-lg px-3 py-1.5 hover:border-amber hover:text-amber transition-all">Gérer →</button>
            </div>
            <!-- Member rows -->
             @foreach($ColorMembers as $member)
            <div class="divide-y divide-stone-100">
              <!-- Marie (Owner) -->
              <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-cream transition-colors">
                <div class="w-9 h-9 rounded-full bg-amber flex items-center justify-center text-white text-xs font-bold flex-shrink-0">{{Auth::user()->name}}</div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-2 text-sm font-medium text-ink">
                    {{ $member->name }}
                    <span class="text-[0.6rem] font-bold px-1.5 py-0.5 rounded bg-amber-light text-amber border border-amber-border">{{ $member->role }}</span>
                  </div>
                  <div class="text-[0.68rem] text-amber mt-0.5">★★★★★ · Rejoint le {{ $member->created_at->format('d/m/Y') }}</div>
                </div>
                <div class="text-right">
                  <div class="text-sm font-semibold text-teal">+47,00 €</div>
                  <div class="text-[0.62rem] text-muted">Vous</div>
                </div>
              </div>
              @endforeach
              <!-- Lucas -->


          <!-- Expenses -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-ink">Dernières dépenses</span>
              <button class="text-xs text-ink-light border border-stone-200 rounded-lg px-3 py-1.5 hover:border-amber hover:text-amber transition-all">Tout voir →</button>
            </div>
            <div class="divide-y divide-stone-100">
              <!-- Row -->
              <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-cream transition-colors">
                <div class="w-2 h-2 rounded-full bg-amber flex-shrink-0"></div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-ink">Courses Monoprix</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">Alimentation · 18 fév</div>
                </div>
                <div class="text-sm font-semibold text-ink">86,40 €</div>
                <div class="flex items-center gap-1.5 bg-sand rounded-full px-2.5 py-1 text-[0.68rem] text-ink-light">
                  <div class="w-3.5 h-3.5 rounded-full bg-amber flex items-center justify-center text-white text-[0.5rem] font-bold">M</div>
                  Marie
                </div>
                <button class="text-stone-300 hover:text-rose transition-colors text-sm">🗑</button>
              </div>
              <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-cream transition-colors">
                <div class="w-2 h-2 rounded-full bg-teal flex-shrink-0"></div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-ink">Facture EDF Février</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">Énergie · 15 fév</div>
                </div>
                <div class="text-sm font-semibold text-ink">94,00 €</div>
                <div class="flex items-center gap-1.5 bg-sand rounded-full px-2.5 py-1 text-[0.68rem] text-ink-light">
                  <div class="w-3.5 h-3.5 rounded-full bg-teal flex items-center justify-center text-white text-[0.5rem] font-bold">L</div>
                  Lucas
                </div>
                <button class="text-stone-300 hover:text-rose transition-colors text-sm">🗑</button>
              </div>
              <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-cream transition-colors">
                <div class="w-2 h-2 rounded-full bg-violet flex-shrink-0"></div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-ink">Produits ménagers</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">Entretien · 12 fév</div>
                </div>
                <div class="text-sm font-semibold text-ink">23,50 €</div>
                <div class="flex items-center gap-1.5 bg-sand rounded-full px-2.5 py-1 text-[0.68rem] text-ink-light">
                  <div class="w-3.5 h-3.5 rounded-full bg-rose flex items-center justify-center text-white text-[0.5rem] font-bold">A</div>
                  Aïcha
                </div>
                <button class="text-stone-300 hover:text-rose transition-colors text-sm">🗑</button>
              </div>
              <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-cream transition-colors">
                <div class="w-2 h-2 rounded-full bg-amber flex-shrink-0"></div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-ink">Loyer commun (charges)</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">Logement · 1 fév</div>
                </div>
                <div class="text-sm font-semibold text-ink">120,00 €</div>
                <div class="flex items-center gap-1.5 bg-sand rounded-full px-2.5 py-1 text-[0.68rem] text-ink-light">
                  <div class="w-3.5 h-3.5 rounded-full bg-amber flex items-center justify-center text-white text-[0.5rem] font-bold">M</div>
                  Marie
                </div>
                <button class="text-stone-300 hover:text-rose transition-colors text-sm">🗑</button>
              </div>
            </div>
          </div>

        </div>

        <!-- RIGHT -->
        <div class="flex flex-col gap-5">

          <!-- Owner quick actions -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-ink">Actions Owner</span>
            </div>
            <div class="p-3 flex flex-col gap-2">
              <button
                onclick="document.getElementById('inviteModal').classList.remove('hidden')"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-cream border border-stone-200 hover:bg-amber-light hover:border-amber-border transition-all text-left w-full">
                <div class="w-8 h-8 rounded-lg bg-amber-light flex items-center justify-center text-base flex-shrink-0">✉️</div>
                <div>
                  <div class="text-sm font-medium text-ink">Inviter un membre</div>
                  <div class="text-[0.68rem] text-muted">Envoyer par email</div>
                </div>
              </button>
              <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-cream border border-stone-200 hover:bg-amber-light hover:border-amber-border transition-all">
                <div class="w-8 h-8 rounded-lg bg-teal-light flex items-center justify-center text-base flex-shrink-0">👥</div>
                <div>
                  <div class="text-sm font-medium text-ink">Gérer les membres</div>
                  <div class="text-[0.68rem] text-muted">Retirer, promouvoir</div>
                </div>
              </a>
              <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-cream border border-stone-200 hover:bg-amber-light hover:border-amber-border transition-all">
                <div class="w-8 h-8 rounded-lg bg-violet-light flex items-center justify-center text-base flex-shrink-0">🏷️</div>
                <div>
                  <div class="text-sm font-medium text-ink">Gérer les catégories</div>
                  <div class="text-[0.68rem] text-muted">Créer, modifier, supprimer</div>
                </div>
              </a>
              <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-cream border border-stone-200 hover:bg-amber-light hover:border-amber-border transition-all">
                <div class="w-8 h-8 rounded-lg bg-rose-light flex items-center justify-center text-base flex-shrink-0">⚖️</div>
                <div>
                  <div class="text-sm font-medium text-ink">Voir les remboursements</div>
                  <div class="text-[0.68rem] text-muted">Qui doit à qui</div>
                </div>
              </a>
            </div>
          </div>

          <!-- Pending invitations -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-ink">Invitations en attente</span>
              <span class="text-[0.65rem] font-bold bg-amber-light text-amber border border-amber-border px-2 py-0.5 rounded-full">2</span>
            </div>
            <div class="divide-y divide-stone-100">
              <div class="flex items-center justify-between px-5 py-3.5">
                <div>
                  <div class="text-sm font-medium text-ink">sophie.r@exemple.fr</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">Envoyée il y a 2j · expire dans 5j</div>
                </div>
                <div class="flex items-center gap-2">
                  <span class="text-[0.65rem] bg-amber-light text-amber border border-amber-border px-2 py-0.5 rounded-full">En attente</span>
                  <button onclick="this.closest('.flex').parentElement.remove()" class="text-xs text-muted border border-stone-200 rounded-md px-2 py-1 hover:border-rose hover:text-rose transition-all">✕</button>
                </div>
              </div>
              <div class="flex items-center justify-between px-5 py-3.5">
                <div>
                  <div class="text-sm font-medium text-ink">pierre.l@exemple.fr</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">Envoyée il y a 4j · expire dans 3j</div>
                </div>
                <div class="flex items-center gap-2">
                  <span class="text-[0.65rem] bg-amber-light text-amber border border-amber-border px-2 py-0.5 rounded-full">En attente</span>
                  <button onclick="this.closest('.flex').parentElement.remove()" class="text-xs text-muted border border-stone-200 rounded-md px-2 py-1 hover:border-rose hover:text-rose transition-all">✕</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Danger zone -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-rose">⚠️ Zone Owner</span>
            </div>
            <div class="p-5">
              <form action="{{ route('colocations_destroy', $colocation->id) }}" method="POST" >
                @csrf
                @method('DELETE')
                <div class="border border-red-200 bg-red-50 rounded-xl p-4">
                  <div class="text-sm font-semibold text-rose mb-1">Annuler la colocation</div>
                  <div class="text-xs text-red-700 leading-relaxed mb-3">Cette action est irréversible. Tous les membres seront informés et les scores de réputation calculés.</div>
                  <button class="text-xs border border-red-300 text-rose rounded-lg px-3 py-1.5 hover:bg-rose hover:text-white hover:border-rose transition-all" type="submit">
                    Annuler la colocation
                  </button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>

    </main>
  </div>

  <!-- ════════ INVITE MODAL ════════ -->
  <div
    id="inviteModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4"
    onclick="if(event.target===this)this.classList.add('hidden')">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
      <div class="flex items-start justify-between p-6 border-b border-stone-100">
        <div>
          <h3 class="font-semibold text-ink text-lg">Inviter un membre</h3>
          <p class="text-sm text-muted mt-0.5">Apt. Saint-Michel</p>
        </div>
        <button onclick="document.getElementById('inviteModal').classList.add('hidden')" class="text-stone-300 hover:text-muted text-xl leading-none">✕</button>
      </div>
      <form class="p-6 flex flex-col gap-4" action="" method="POST">
        @csrf
        <div>
          <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">
            Adresse email <span class="text-amber">*</span>
          </label>
          <input type="email" id="invite_email" placeholder="prenom.nom@exemple.fr" required
            class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
        </div>
        <div>
          <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">
            Message <span class="text-stone-300 font-normal normal-case tracking-normal">· facultatif</span>
          </label>
          <textarea rows="3" placeholder="Ex: Salut ! Je t'invite dans notre coloc…"
            class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink resize-none leading-relaxed focus:outline-none focus:border-amber transition-all"></textarea>
        </div>
        <div class="flex items-start gap-2.5 bg-amber-light border border-amber-border rounded-xl px-4 py-3">
          <span class="text-amber text-sm mt-px">🔗</span>
          <p class="text-xs text-amber-dark leading-relaxed">Un lien valable <strong>7 jours</strong> sera envoyé à cette adresse.</p>
        </div>
        <div class="flex gap-3 pt-1">
          <button type="button" onclick="document.getElementById('inviteModal').classList.add('hidden')"
            class="flex-1 py-2.5 rounded-xl border border-stone-200 text-sm text-muted hover:border-stone-300 hover:text-ink-light transition-all">
            Annuler
          </button>
          <button type="submit" id="invite-btn"
            class="flex-1 py-2.5 rounded-xl bg-amber hover:bg-amber-dark text-white text-sm font-semibold transition-all">
            ✉️ Envoyer
          </button>
        </div>
      </form>
    </div>
  </div>

  <div
    id="expModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4"
    onclick="if(event.target===this)this.classList.add('hidden')">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md">
      <div class="flex items-center justify-between p-6 border-b border-stone-100">
        <div>
          <h3 class="font-display text-[1.35rem] font-semibold text-ink">Ajouter une dépense</h3>
          <p class="text-sm text-muted mt-0.5">Partagée entre tous les membres.</p>
        </div>
        <button onclick="document.getElementById('expModal').classList.add('hidden')" class="text-stone-300 hover:text-muted text-xl">✕</button>
      </div>
      <div class="p-6 flex flex-col gap-4">
        <div>
          <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Titre</label>
          <input type="text" placeholder="Courses, EDF…"
            class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Montant €</label>
            <input type="number" placeholder="0.00" step="0.01"
              class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
          </div>
          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Date</label>
            <input type="date" value="2025-02-25"
              class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Catégorie</label>
            <select class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
              <option>Alimentation</option>
              <option>Énergie</option>
              <option>Entretien</option>
              <option>Logement</option>
              <option>Autre</option>
            </select>
          </div>
          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Payé par</label>
            <select class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
              <option>Marie (moi)</option>
              <option>Lucas</option>
              <option>Aïcha</option>
              <option>Tom</option>
            </select>
          </div>
        </div>
        <div class="flex gap-3 pt-1">
          <button onclick="document.getElementById('expModal').classList.add('hidden')"
            class="flex-1 py-2.5 rounded-xl border border-stone-200 text-sm text-muted hover:border-stone-300 transition-all">
            Annuler
          </button>
          <button onclick="document.getElementById('expModal').classList.add('hidden')"
            class="flex-1 py-2.5 rounded-xl bg-amber hover:bg-amber-dark text-white text-sm font-semibold transition-all">
            Ajouter
          </button>
        </div>
      </div>
    </div>
  </div>


</body>

</html>