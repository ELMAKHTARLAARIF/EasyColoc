<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoLoc — Administration Globale</title>
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
            'fade-up': 'fadeUp 0.4s ease both'
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
    select {
      font-family: 'DM Sans', sans-serif;
    }

    input:focus,
    select:focus {
      outline: none;
      border-color: #D97706 !important;
      box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
    }

    input::placeholder {
      color: #C4BDB3;
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

    .delay-5 {
      animation-delay: 0.25s;
    }

    .delay-6 {
      animation-delay: 0.30s;
    }
  </style>
</head>

<body class="bg-cream text-ink flex min-h-screen">

  <!-- SIDEBAR -->
  <aside class="w-64 bg-[#1C1917] fixed top-0 left-0 bottom-0 flex flex-col z-20">
    <div class="px-6 py-7 border-b border-white/[0.07]">
      <div style="font-family:'Cormorant Garamond',serif;font-size:1.6rem;color:#FAFAF9;letter-spacing:-0.01em;">
        Co<em style="font-style:normal;color:#D97706;">Loc</em>
      </div>
      <div class="text-[0.68rem] text-white/35 mt-1.5 uppercase tracking-wider">Apt. Saint-Michel · Admin</div>
    </div>
    <nav class="flex-1 px-3 py-4 space-y-0.5 overflow-y-auto">
      <div class="text-[0.6rem] uppercase tracking-[0.12em] text-white/25 px-3 pt-2 pb-1">Général</div>
      <a href="#" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm font-medium bg-[#D97706] text-white transition-all"><span class="w-4 text-center">🛡️</span> Administration</a>
    </nav>
    <div class="px-5 py-4 border-t border-white/[0.07] flex items-center gap-3">
      <div class="w-8 h-8 rounded-full bg-[#D97706] flex items-center justify-center text-white text-xs font-semibold flex-shrink-0">MD</div>
      <div class="min-w-0">
        <div class="text-white/80 text-sm font-medium truncate">Marie Dupont</div>
        <div class="text-white/30 text-[0.65rem] mt-0.5">🛡️ Global Admin</div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="ml-64 flex-1 flex flex-col min-h-screen">

    <!-- Topbar -->
    <header class="bg-white border-b border-stone-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
      <div>
        <h1 class="font-display text-[1.4rem] font-semibold text-ink leading-tight">Administration Globale</h1>
        <p class="text-sm text-muted mt-0.5">Panneau de contrôle · Accès restreint</p>
      </div>
      <div class="flex items-center gap-2">
        <span class="text-[0.65rem] font-bold bg-rose-light text-rose border border-rose/20 px-3 py-1 rounded-full">🛡️ Global Admin</span>
      </div>
    </header>

    <main class="p-8 flex flex-col gap-6">
      @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
      </div>
      @endif

      @if(session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
      </div>
      @endif
      <!-- Admin banner -->
      <div class="animate-fade-up relative overflow-hidden rounded-xl px-7 py-5 flex items-center gap-6"
        style="background: linear-gradient(120deg, #1C1917 0%, #292524 60%, #3C2A1E 100%)">
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-7xl opacity-[0.08] pointer-events-none select-none">🛡️</div>
        <div class="text-3xl">🛡️</div>
        <div>
          <h2 class="font-display text-[1.3rem] font-semibold text-white leading-tight">Panneau Global Admin</h2>
          <p class="text-sm text-white/50 mt-0.5">Accès total à la plateforme · Statistiques en temps réel · Gestion des utilisateurs</p>
        </div>
        <div class="ml-auto flex gap-2.5 z-10 flex-shrink-0">
          <span class="text-xs px-3 py-1.5 rounded-lg bg-white/10 border border-white/20 text-white/70">Dernière connexion: aujourd'hui 09:41</span>
        </div>
      </div>

      <!-- ── STATS GLOBALES ── -->
      <div class="grid grid-cols-3 gap-4">

        <div class="animate-fade-up delay-1 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-violet-light flex items-center justify-center">👥</div>
            <span class="text-[0.68rem] font-semibold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">+8 ce mois</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">1 284</div>
          <div class="text-xs text-muted mt-1">Utilisateurs inscrits</div>
          <div class="mt-3 pt-3 border-t border-stone-100 flex items-center justify-between text-[0.65rem]">
            <span class="text-green-600 font-medium">↑ 1 198 actifs</span>
            <span class="text-rose font-medium">86 bannis</span>
          </div>
        </div>

        <div class="animate-fade-up delay-2 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-teal-light flex items-center justify-center">🏠</div>
            <span class="text-[0.68rem] font-semibold bg-stone-100 text-muted px-1.5 py-0.5 rounded">total</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">347</div>
          <div class="text-xs text-muted mt-1">Colocations actives</div>
          <div class="mt-3 pt-3 border-t border-stone-100 flex items-center justify-between text-[0.65rem]">
            <span class="text-muted">Moy. 3.7 membres</span>
            <span class="text-amber font-medium">12 inactives</span>
          </div>
        </div>

        <div class="animate-fade-up delay-3 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-amber-light flex items-center justify-center">💶</div>
            <span class="text-[0.68rem] font-semibold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">ce mois</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">84 290 €</div>
          <div class="text-xs text-muted mt-1">Volume de dépenses</div>
          <div class="mt-3 pt-3 border-t border-stone-100 flex items-center justify-between text-[0.65rem]">
            <span class="text-muted">12 483 transactions</span>
            <span class="text-teal font-medium">↑ +14%</span>
          </div>
        </div>

      </div>

      <!-- Second stats row -->
      <div class="grid grid-cols-3 gap-4">

        <div class="animate-fade-up delay-4 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-rose-light flex items-center justify-center">🚨</div>
            <span class="text-[0.68rem] font-semibold bg-red-100 text-red-700 px-1.5 py-0.5 rounded">À traiter</span>
          </div>
          <div class="font-display text-[2rem] text-rose leading-none">7</div>
          <div class="text-xs text-muted mt-1">Signalements ouverts</div>
        </div>

        <div class="animate-fade-up delay-5 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-amber-light flex items-center justify-center">✉️</div>
            <span class="text-[0.68rem] font-semibold bg-stone-100 text-muted px-1.5 py-0.5 rounded">total</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">2 140</div>
          <div class="text-xs text-muted mt-1">Invitations envoyées</div>
        </div>

        <div class="animate-fade-up delay-6 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-violet-light flex items-center justify-center">⭐</div>
            <span class="text-[0.68rem] font-semibold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">plateforme</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">4.6</div>
          <div class="text-xs text-muted mt-1">Réputation moyenne</div>
        </div>

      </div>

      <!-- ── USERS TABLE ── -->
      <div class="animate-fade-up bg-white border border-stone-200 rounded-xl overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-5 py-4 border-b border-stone-100">
          <span class="text-sm font-semibold text-ink">Gestion des utilisateurs</span>
          <div class="flex items-center gap-2">
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-muted text-xs">🔍</span>
              <input type="text" id="user-search" placeholder="Rechercher un utilisateur…" oninput="filterUsers()"
                class="pl-8 pr-4 py-1.5 rounded-lg border border-stone-200 bg-stone-50 text-xs text-ink w-52 transition-all">
            </div>
            <select id="user-filter" onchange="filterUsers()"
              class="text-xs border border-stone-200 rounded-lg px-3 py-1.5 bg-stone-50 text-ink-light transition-all">
              <option value="">Tous</option>
              <option value="active">✅ Actifs</option>
              <option value="banned">🚫 Bannis</option>
            </select>
          </div>
        </div>

        <!-- Table header -->
        <div class="grid grid-cols-[40px_1fr_110px_140px] gap-3 items-center px-5 py-2.5 bg-stone-50 border-b border-stone-100 text-[0.65rem] font-semibold uppercase tracking-wider text-muted">
          <div></div>
          <div>Utilisateur</div>
          <div class="text-center">Statut</div>
          <div class="text-center">Actions</div>
        </div>

        <!-- Users list -->
        <div id="users-list" class="divide-y divide-stone-100">

          @foreach($users as $user)
          <div class="user-row grid grid-cols-[40px_1fr_110px_140px] gap-3 items-center px-5 py-3.5 hover:bg-cream transition-colors" data-name="{{ strtolower($user->name) }}" data-status="active">
            <div class="w-8 h-8 rounded-full bg-amber flex items-center justify-center text-white text-xs font-bold flex-shrink-0">MD</div>
            <div>
              <div class="text-sm font-medium text-ink">{{$user->name}}</div>
              <div class="text-[0.68rem] text-muted mt-0.5">{{$user->email}} · {{$user->created_at}}</div>
            </div>
            <div class="flex items-center justify-center">
              <span class="text-[0.62rem] font-bold bg-green-100 text-green-700 border border-green-200 px-2 py-0.5 rounded-full whitespace-nowrap">{{$user->status}}</span>
            </div>
            <div class="flex items-center justify-center gap-1.5">
              <form action="{{ route('user_debanir', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button onclick="openUserModal('Marie Dupont', 'marie.dupont@exemple.fr', 'active', 1)"
                  class="text-[0.65rem] border border-stone-200 text-muted rounded-lg px-2.5 py-1 hover:border-amber hover:text-amber transition-all whitespace-nowrap">
                  Debanir
                </button>
              </form>
              <form action="{{ route('user_ban', $user->id) }}" method="POST">
                @csrf
                <button type="submit"
                  class="text-[0.65rem] border border-red-200 text-rose rounded-lg px-2.5 py-1 hover:bg-rose hover:text-white hover:border-rose transition-all whitespace-nowrap">
                  Bannir
                </button>
              </form>
            </div>
          </div>
          @endforeach

          <!-- Empty state -->
          <div id="users-empty" class="hidden px-5 py-12 text-center">
            <div class="text-3xl mb-3">🔍</div>
            <div class="text-sm font-medium text-ink">Aucun utilisateur trouvé</div>
            <div class="text-xs text-muted mt-1">Essayez d'autres filtres</div>
          </div>

        </div>

        <!-- Footer -->
        <div class="px-5 py-3.5 border-t border-stone-100 bg-stone-50 flex items-center justify-between">
          <span class="text-xs text-muted">
            <span id="users-count">{{$users->count()}}</span> utilisateurs affichés
          </span>
          <div class="flex items-center gap-3 text-xs text-muted">
            <span class="text-green-600 font-medium">4 actifs</span>
            <span>·</span>
            <span class="text-rose font-medium">2 bannis</span>
          </div>
        </div>

      </div>
    </main>
  </div>


</body>

</html>