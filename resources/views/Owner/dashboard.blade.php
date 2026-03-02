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


  @include('header.aside', ['colocMember' => $colocMember])
  <!-- ════════ MAIN ════════ -->
  <div class="ml-64 flex-1 flex flex-col min-h-screen">

    @include('header.header', ['colocMember' => $colocMember])

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
      <div class="animate-fade-up relative overflow-hidden rounded-xl px-7 py-5 flex items-center gap-6"
        style="background: linear-gradient(120deg, #92400E 0%, #B45309 60%, #D97706 100%)">
        <div class="text-3xl">👑</div>
        <div>
          <h2 class="font-display text-[1.3rem] font-semibold text-white leading-tight">{{ $colocMember->colocation->name }}</h2>
          <p class="text-sm text-white/60 mt-0.5">Vous {{$colocMember->role}} cette colocation · {{ $colocMember->count() }} membres actifs · Créée le {{ $colocMember->colocation->created_at->format('d M Y') }}</p>
        </div>
        <div class="ml-auto flex gap-2.5 z-10 flex-shrink-0">
          <button class="text-sm px-4 py-2 rounded-lg bg-white/15 border border-white/30 text-white hover:bg-white/25 transition-all">Gérer les membres</button>
          <a href="{{ route('depenses') }}" class="text-sm px-4 py-2 rounded-lg bg-white text-amber-dark font-semibold hover:bg-amber-light transition-all">Voir les dépenses</a>
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
          <div class="font-display text-[2rem] text-ink leading-none">{{ $colocMember->solde }} €</div>
          <div class="text-xs text-muted mt-1">Votre solde net</div>
        </div>
        <div class="animate-fade-up delay-3 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-violet-light flex items-center justify-center text-base">👥</div>
            <span class="text-[0.68rem] font-semibold bg-sand text-muted px-1.5 py-0.5 rounded">stable</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">
            {{ $ColocMembers->where('status', 'active')->count() }}
          </div>
          <div class="text-xs text-muted mt-1">Membres actifs</div>
        </div>
        <div class="animate-fade-up delay-4 bg-white border border-stone-200 rounded-xl p-5 hover:shadow-sm transition-shadow">
          <div class="flex items-center justify-between mb-4">
            <div class="w-9 h-9 rounded-lg bg-rose-light flex items-center justify-center text-base">⭐</div>
            <span class="text-[0.68rem] font-semibold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">+1</span>
          </div>
          <div class="font-display text-[2rem] text-ink leading-none">{{ Auth::user()->reputation }}</div>
          <div class="text-xs text-muted mt-1">Votre réputation</div>
        </div>
      </div>

      <!-- Main grid -->
      <div class="grid grid-cols-[1fr_320px] gap-5">

        <!-- LEFT -->
        <div class="flex flex-col gap-5">

          <!-- ① Members -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-ink">Membres de la colocation</span>
              <button class="text-xs text-ink-light border border-stone-200 rounded-lg px-3 py-1.5 hover:border-amber hover:text-amber transition-all">Gérer →</button>
            </div>
            <div class="divide-y divide-stone-100">
              @foreach($ColocMembers as $member)
              <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-cream transition-colors">
                <div class="w-9 h-9 rounded-full bg-amber flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                  {{ $member->user->name}}
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-center gap-2 text-sm font-medium text-ink flex-wrap">
                    {{ $member->user->name }}
                    <span class="text-[0.6rem] font-bold px-1.5 py-0.5 rounded bg-amber-light text-amber border border-amber-border">{{ $member->role }}</span>
                  </div>
                  <div class="text-[0.68rem] text-amber mt-0.5">★★★★★ · Rejoint le {{ $member->created_at->format('d/m/Y') }}</div>
                </div>
                <div class="text-right mr-3">
                  <div class="text-sm font-semibold text-teal">{{ $member->solde }} €</div>
                  <div class="text-[0.62rem] text-muted">solde</div>
                </div>
                @if($member->user_id !== Auth::id() && $member->role !== 'owner')
                <form method="POST" action="#">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Retirer {{ $member->user->name }} ?')"
                    class="text-[0.68rem] border border-red-200 text-rose rounded-lg px-2.5 py-1 hover:bg-rose hover:text-white hover:border-rose transition-all whitespace-nowrap">
                    Retirer
                  </button>
                </form>
                @endif
              </div>
              @endforeach
            </div>
          </div>
          <!-- END ① Members -->

          <!-- ② Expenses -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-ink">Dépenses non payées</span>
              <button class="text-xs text-ink-light border border-stone-200 rounded-lg px-3 py-1.5 hover:border-amber hover:text-amber transition-all">Tout voir →</button>
            </div>
            <div class="divide-y divide-stone-100">
              @if(
              $colocMember->colocation
              ->payments()
              ->where('status', 'unpaid')
              ->where('payed_id', Auth::id())
              ->count() == 0
              )
              <div class="px-5 py-3.5 text-center text-sm text-muted">
                Aucune dépense non payée
              </div>
              @else
              @foreach($depenses as $depense)
              <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-cream transition-colors">
                <div class="w-2 h-2 rounded-full bg-amber flex-shrink-0"></div>
                <div class="flex-1 min-w-0">
                  <div class="text-sm font-medium text-ink">{{ $depense->name }}</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">{{ $depense->category->name }} · {{ $depense->created_at->format('d M') }}</div>
                </div>
                <div class="text-sm font-semibold text-ink whitespace-nowrap">{{ number_format($depense->amount, 2, ',', ' ') }} €</div>
                <div class="flex items-center gap-1.5 bg-sand rounded-full px-2.5 py-1 text-[0.68rem] text-ink-light whitespace-nowrap">
                  <div class="w-3.5 h-3.5 rounded-full bg-amber flex items-center justify-center text-white text-[0.5rem] font-bold flex-shrink-0">M</div>
                  {{ $depense->payer->name }}
                </div>
                <div>
                  @if($depense->payments()->where('payed_id', Auth::id())->where('status', 'unpaid')->exists())
                  <form action="{{ route('depense_markAsPaid', $depense->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="text-[0.65rem] bg-red-100 text-red-700 border border-red-300 px-2 py-0.5 rounded-full">
                      non payé
                    </button>
                  </form>
                  @else
                  <span class="text-[0.65rem] bg-green-100 text-green-700 border border-green-300 px-2 py-0.5 rounded-full">Payé</span>
                  @endif
                </div>
                <!-- <a href="" onclick="return confirm('Supprimer cette dépense ?')" class="text-stone-300 hover:text-rose transition-colors text-sm leading-none"></a> -->
              </div>
              @endforeach
            </div>
            @endif
          </div>
        </div>

        @if($colocMember->is_owner)
        <div class="flex flex-col gap-5">

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
            </div>
          </div>


          <!-- Pending invitations -->
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-ink">Invitations en attente</span>
              <span class="text-[0.65rem] font-bold bg-amber-light text-amber border border-amber-border px-2 py-0.5 rounded-full">{{ $invitations->count() }}</span>
            </div>
            <div class="divide-y divide-stone-100">
              <div class="flex items-center justify-between px-5 py-3.5">

                @foreach($invitations as $invitation)
                <div>
                  <div class="text-sm font-medium text-ink">{{ $invitation->email }}</div>
                  <div class="text-[0.68rem] text-muted mt-0.5">Envoyée il y a {{ $invitation->created_at->diffForHumans() }}</div>
                </div>

                <div class="flex items-center gap-2">
                  <span class="text-[0.65rem] bg-amber-light text-amber border border-amber-border px-2 py-0.5 rounded-full">En attente</span>
                  <button onclick="this.closest('.flex.items-center.justify-between').remove()" class="text-xs text-muted border border-stone-200 rounded-md px-2 py-1 hover:border-rose hover:text-rose transition-all">✕</button>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          @endif
          <!-- Danger zone -->
          @if($colocMember->role === 'owner')
          <div class="bg-white border border-stone-200 rounded-xl overflow-hidden">
            <div class="px-5 py-4 border-b border-stone-100">
              <span class="text-sm font-semibold text-rose">⚠️ Zone Owner</span>
            </div>
            <div class="p-5">
              <form action="{{ route('colocations_destroy', $colocMember->colocation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="border border-red-200 bg-red-50 rounded-xl p-4">
                  <div class="text-sm font-semibold text-rose mb-1">Annuler la colocation</div>
                  <div class="text-xs text-red-700 leading-relaxed mb-3">Cette action est irréversible. Tous les membres seront informés et les scores de réputation calculés.</div>
                  <button type="submit" onclick="return confirm('Annuler définitivement cette colocation ?')"
                    class="text-xs border border-red-300 text-rose rounded-lg px-3 py-1.5 hover:bg-rose hover:text-white hover:border-rose transition-all">
                    Annuler la colocation
                  </button>
                </div>
              </form>
            </div>
          </div>
          @endif

        </div>
        <!-- END RIGHT -->

      </div>

    </main>

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
        <form class="p-6 flex flex-col gap-4" action="{{ route('colocations_invite', $colocMember->colocation->id) }}" method="POST">
          @csrf
          <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">
              Adresse email <span class="text-amber">*</span>
            </label>
            <input type="email" name="email" id="invite_email" placeholder="prenom.nom@exemple.fr" required
              class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all focus:outline-none focus:border-amber">
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
          <form action="{{ route('create_depense') }}" method="POST">
            @csrf
            <div>
              <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Titre</label>
              <input type="text" placeholder="Courses, EDF…" name="name"
                class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
            </div>
            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Montant €</label>
                <input type="number" placeholder="0.00" step="0.01" name="amount"
                  class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
              </div>
              <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Date</label>
                <input type="date" name="date" value="2025-02-25"
                  class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
              </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
              <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Catégorie</label>
                <input type="text" name="category" placeholder="Alimentation, Logement…"
                  class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
                </input>
              </div>
              <input type="hidden" name="colocation_id" value="{{ $colocMember->colocation->id }}">
              <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-muted mb-1.5">Payé par</label>
                <select name="payer_id" class="w-full px-4 py-2.5 rounded-xl border border-stone-200 bg-stone-50 text-sm text-ink transition-all">
                  @foreach($ColocMembers as $member)
                  <option value="{{ $member->user->id }}">{{ $member->user->name }}</option>
                  @endforeach
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
        </form>
      </div>
    </div>


</body>

</html>