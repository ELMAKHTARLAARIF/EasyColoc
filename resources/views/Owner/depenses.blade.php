<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoLoc — Dépenses</title>
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
    select,
    textarea {
      font-family: 'DM Sans', sans-serif;
    }

    input:focus,
    select:focus,
    textarea:focus {
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
  </style>
</head>

<body class="bg-cream text-ink flex min-h-screen">

  <!-- SIDEBAR -->
  @include('header.aside ', ['colocMember' => $colocMember])

  <!-- MAIN -->
  <div class="ml-64 flex-1 flex flex-col min-h-screen">
    @include('header.header', ['colocMember' => $colocMember])
    <main class="p-8 flex flex-col gap-6">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded">
            {{ session('error') }}
        </div>
    @endif
      <div class="grid grid-cols-4 gap-4">
        <div class="animate-fade-up delay-1 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-amber-light flex items-center justify-center">💶</div>
            <span class="text-[0.68rem] font-semibold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">Ce mois</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">324 €</div>
          <div class="text-xs text-muted mt-1">Total dépenses</div>
        </div>
        <div class="animate-fade-up delay-2 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-teal-light flex items-center justify-center">👤</div>
            <span class="text-[0.68rem] font-semibold bg-stone-100 text-muted px-1.5 py-0.5 rounded">par membre</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">81 €</div>
          <div class="text-xs text-muted mt-1">Quote-part moyenne</div>
        </div>
        <div class="animate-fade-up delay-3 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-violet-light flex items-center justify-center">📋</div>
            <span class="text-[0.68rem] font-semibold bg-stone-100 text-muted px-1.5 py-0.5 rounded">total</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">12</div>
          <div class="text-xs text-muted mt-1">Dépenses ce mois</div>
        </div>
        <div class="animate-fade-up delay-4 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-rose-light flex items-center justify-center">⚖️</div>
            <span class="text-[0.68rem] font-semibold text-teal bg-teal-light px-1.5 py-0.5 rounded">+47 €</span>
          </div>
          <div class="font-display text-[2rem] text-teal leading-none">+47 €</div>
          <div class="text-xs text-muted mt-1">Votre solde net</div>
        </div>
      </div>

      <!-- Filters + Table -->
      <div class="animate-fade-up bg-white border border-stone-200 rounded-xl overflow-hidden">

        <!-- Filter bar -->
        <div class="flex items-center gap-3 px-5 py-3.5 border-b border-stone-100 flex-wrap">
          <!-- Month filter -->
          <select id="filter-month" onchange="filterExpenses()"
            class="text-xs border border-stone-200 rounded-lg px-3 py-1.5 bg-stone-50 text-ink-light transition-all">
            <option value="">Tous les mois</option>
            <option value="fév" selected>Février 2025</option>
            <option value="jan">Janvier 2025</option>
            <option value="déc">Décembre 2024</option>
          </select>

          <!-- Category filter -->
          <select id="filter-cat" onchange="filterExpenses()"
            class="text-xs border border-stone-200 rounded-lg px-3 py-1.5 bg-stone-50 text-ink-light transition-all">
            <option value="">Toutes catégories</option>
            <option value="Alimentation">🛒 Alimentation</option>
            <option value="Énergie">⚡ Énergie</option>
            <option value="Entretien">🧹 Entretien</option>
            <option value="Logement">🏠 Logement</option>
            <option value="Autre">📦 Autre</option>
          </select>

          <!-- Member filter -->
          <select id="filter-member" onchange="filterExpenses()"
            class="text-xs border border-stone-200 rounded-lg px-3 py-1.5 bg-stone-50 text-ink-light transition-all">

            @foreach($members as $member)
            <option value="{{$member->user_id}}">{{$member->user->name}}</option>
            @endforeach
          </select>

          <!-- Active filters count -->
          <span id="filter-count" class="hidden text-[0.65rem] font-bold bg-amber-light text-amber border border-amber-border px-2 py-0.5 rounded-full"></span>

          <!-- Reset -->
          <button onclick="resetFilters()" class="text-xs text-muted hover:text-rose transition-colors ml-auto">
            Réinitialiser
          </button>

          <!-- Total filtered -->
          <div class="text-xs text-muted">
            <span id="visible-count">12</span> dépenses ·
            <span id="visible-total" class="font-semibold text-ink">324,00 €</span>
          </div>
        </div>

        <!-- Table header -->
        <div class="grid grid-cols-[auto_1fr_130px_120px_120px_44px] gap-3 items-center px-5 py-2.5 bg-stone-50 border-b border-stone-100 text-[0.65rem] font-semibold uppercase tracking-wider text-muted">
          <div class="w-2"></div>
          <div>Dépense</div>
          <div>Catégorie</div>
          <div>Payé par</div>
          <div class="text-right">Montant</div>
          <div></div>
        </div>

        <!-- Expense rows -->
        <div id="expenses-list" class="divide-y divide-stone-100">


          @foreach($depenses as $depense)
          <div class="expense-row grid grid-cols-[auto_1fr_130px_120px_120px_44px] gap-3 items-center px-5 py-3.5 hover:bg-cream transition-colors"
            data-name="{{ $depense->name }}" data-cat="{{ $depense->category->name }}" data-member="{{ $depense->payer->name }}" data-date="fév" data-amount="{{ $depense->amount }}">
            <div class="w-2 h-2 rounded-full bg-amber flex-shrink-0"></div>
            <div>
              <div class="text-sm font-medium text-ink">{{ $depense->name }}</div>
              <div class="text-[0.68rem] text-muted mt-0.5">18 fév 2025</div>
            </div>
            <div>
              <span class="inline-flex items-center gap-1 text-[0.68rem] bg-amber-light text-amber-dark border border-amber-border px-2 py-0.5 rounded-full">
                🛒 {{ $depense->category->name }}
              </span>
            </div>
            <div class="flex items-center gap-1.5">
              <div class="w-5 h-5 rounded-full bg-amber flex items-center justify-center text-white text-[0.5rem] font-bold flex-shrink-0">M</div>
              <span class="text-xs text-ink-light">{{ $depense->payer->name }}</span>
            </div>
            <div class="text-sm font-semibold text-ink text-right">{{ number_format($depense->amount, 2, ',', ' ') }} €</div>
            <div class="flex items-center justify-end gap-1">
              <button onclick="openEdit(this)" class="w-7 h-7 rounded-lg hover:bg-stone-100 flex items-center justify-center text-muted hover:text-ink transition-all text-xs">✎</button>
              <button onclick="deleteRow(this)" class="w-7 h-7 rounded-lg hover:bg-red-50 flex items-center justify-center text-stone-300 hover:text-rose transition-all text-xs">🗑</button>
            </div>
          </div>


          @endforeach
          <div id="empty-state" class="hidden px-5 py-12 text-center">
            <div class="text-3xl mb-3">🔍</div>
            <div class="text-sm font-medium text-ink">Aucune dépense trouvée</div>
            <div class="text-xs text-muted mt-1">Essayez d'autres filtres</div>
          </div>
          <div class="px-5 py-3.5 border-t border-stone-100 bg-stone-50 flex items-center justify-between">
            <span class="text-xs text-muted">
              <span id="footer-count">6</span> dépenses affichées
            </span>
            <div class="flex items-center gap-4">
              <span class="text-xs text-muted">{{ $depenses->count() }} dépenses</span>
              <span id="footer-total" class="text-sm font-semibold text-ink">{{$toalDepenses}} €</span>
            </div>
          </div>
        </div>

        <!-- Table footer -->


      </div>

    </main>
  </div>

  <!-- ════════ EDIT EXPENSE MODAL ════════ -->
  <div id="editModal"
    class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4"
    onclick="if(event.target===this)this.classList.add('hidden')">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md">
      <div class="flex items-center justify-between p-6 border-b border-stone-100">
        <div>
          <h3 class="font-display text-[1.35rem] font-semibold text-ink">Modifier la dépense</h3>
        </div>
        <button onclick="document.getElementById('editModal').classList.add('hidden')"
          class="text-stone-300 hover:text-muted text-xl">✕</button>
      </div>
      <form class="p-6 flex flex-col gap-4" method="POST" action="{{ route('expenses_edit', ['id' => $depense->id]) }}">
         @csrf @method('PUT')
        <div>
          <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Titre <span class="text-amber">*</span></label>
          <input type="text" name="title" id="edit-title"
            class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Montant €</label>
            <input type="number" name="amount" id="edit-amount" step="0.01"
              class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
          </div>
          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Date</label>
            <input type="date" name="date"
              class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Catégorie</label>
                <input type="text" name="category" placeholder="Alimentation, Logement…" value="{{ $depense->category->name }}"
                  class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
                </input>
              </div>
              <input type="hidden" name="colocation_id" value="{{ $colocMember->colocation->id }}">
              <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Payé par</label>
                <select name="payer_id" class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
                  @foreach($members as $member)
                  <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                  @endforeach
                </select>
              </div>
        </div>
        <div class="flex gap-3 pt-1">
          <button type="button" onclick="document.getElementById('editModal').classList.add('hidden')"
            class="flex-1 py-2.5 rounded-xl border border-stone-200 text-sm text-muted hover:border-stone-300 transition-all">
            Annuler
          </button>
          <a href=""></a><button type="submit"
            class="flex-1 py-2.5 rounded-xl bg-amber hover:bg-amber-dark text-white text-sm font-semibold transition-all">
            Sauvegarder
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>

    function openEdit(btn) {
      const row = btn.closest('.expense-row');
      const title = row.querySelector('.text-sm.font-medium').textContent.trim();
      const amt = row.dataset.amount;
      document.getElementById('edit-title').value = title;
      document.getElementById('edit-amount').value = amt;
      document.getElementById('editModal').classList.remove('hidden');
    }
  </script>

</body>

</html>