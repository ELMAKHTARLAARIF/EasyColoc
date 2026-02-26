<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoLoc — Créer une colocation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,300;0,600;1,400&family=Epilogue:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Fraunces', 'serif'],
                        body: ['Epilogue', 'sans-serif'],
                    },
                    colors: {
                        amber: {
                            DEFAULT: '#C47A1A',
                            light: '#FDF6E8',
                            border: '#F5DFA0',
                            bright: '#F2A922'
                        },
                        ink: {
                            DEFAULT: '#18160F',
                            2: '#3D3A32'
                        },
                        muted: '#8A8278',
                        sand: '#EDE9E2',
                        panel: '#16140F',
                        canvas: '#F7F5F2',
                    },
                    animation: {
                        'spin-slow': 'spin 40s linear infinite',
                        'spin-medium': 'spin 28s linear infinite reverse',
                        'spin-fast': 'spin 32s linear infinite',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Epilogue', sans-serif;
        }

        .font-display {
            font-family: 'Fraunces', serif;
        }

        input,
        textarea,
        select {
            font-family: 'Epilogue', sans-serif;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #C47A1A !important;
            box-shadow: 0 0 0 3px rgba(196, 122, 26, 0.12);
        }

        input::placeholder,
        textarea::placeholder {
            color: #C4BDB3;
        }

        textarea {
            resize: none;
        }
    </style>
</head>

<body class="bg-canvas min-h-screen flex flex-col">

    <!-- NAV -->
    <nav class="bg-white border-b border-sand flex items-center justify-between px-6 py-3.5 sticky top-0 z-20">
        <a href="home-tailwind.html" class="font-display text-2xl font-semibold text-ink tracking-tight">
            Co<em class="not-italic font-light text-amber">Loc</em>
        </a>
        <a href="{{ route('home') }}"
            class="text-sm text-muted border border-sand rounded-lg px-3.5 py-1.5 hover:border-amber hover:text-amber transition-all">
            ← Retour
        </a>
    </nav>

    <!-- SPLIT LAYOUT -->
    <div class="flex-1 grid grid-cols-1 lg:grid-cols-2">

        <!-- ════ LEFT PANEL ════ -->
        <div class="bg-panel hidden lg:flex flex-col justify-between p-12 relative overflow-hidden">

            <!-- Decorative rings -->
            <div class="absolute -top-40 -left-40 w-[480px] h-[480px] rounded-full border border-amber/10 animate-spin-slow pointer-events-none"></div>
            <div class="absolute -top-20 -left-20 w-[320px] h-[320px] rounded-full border border-amber/10 animate-spin-medium pointer-events-none"></div>
            <div class="absolute bottom-10 -right-20 w-[260px] h-[260px] rounded-full border border-amber/10 animate-spin-fast pointer-events-none"></div>
            <div class="absolute -top-32 right-0 w-[500px] h-[500px] rounded-full bg-amber/[0.07] blur-[100px] pointer-events-none"></div>

            <!-- Logo -->
            <div class="font-display text-2xl font-semibold text-[#F7F5F2] tracking-tight relative z-10">
                Co<em class="not-italic font-light text-amber">Loc</em>
            </div>

            <!-- Middle content -->
            <div class="relative z-10">
                <div class="flex items-center gap-2 text-[10px] uppercase tracking-[0.14em] text-amber font-medium mb-5">
                    <span class="w-6 h-px bg-amber block"></span>
                    Créer une colocation
                </div>
                <h1 class="font-display text-[clamp(2rem,3.2vw,3rem)] font-semibold text-[#F7F5F2] leading-[1.05] tracking-[-0.03em] mb-4">
                    Votre espace<br>commence <em class="not-italic font-light text-amber-bright">maintenant</em>
                </h1>
                <p class="text-sm text-white/35 leading-relaxed max-w-sm mb-8">
                    En créant cette colocation, vous en devenez l'Owner. Invitez vos colocataires, gérez les dépenses, suivez les remboursements.
                </p>

                <!-- Perks -->
                <div class="flex flex-col gap-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber/10 border border-amber/20 flex items-center justify-center text-sm flex-shrink-0">✉️</div>
                        <div>
                            <div class="text-sm font-medium text-white/75">Invitations par lien sécurisé</div>
                            <div class="text-xs text-white/30 mt-0.5">Lien unique valable 7 jours</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber/10 border border-amber/20 flex items-center justify-center text-sm flex-shrink-0">💶</div>
                        <div>
                            <div class="text-sm font-medium text-white/75">Dépenses et soldes automatiques</div>
                            <div class="text-xs text-white/30 mt-0.5">Calcul en temps réel de qui doit quoi</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber/10 border border-amber/20 flex items-center justify-center text-sm flex-shrink-0">⭐</div>
                        <div>
                            <div class="text-sm font-medium text-white/75">Système de réputation</div>
                            <div class="text-xs text-white/30 mt-0.5">Valorisez les bons comportements financiers</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Owner badge -->
            <div class="relative z-10 flex items-start gap-3 bg-amber/10 border border-amber/20 rounded-xl p-4">
                <span class="text-xl">👑</span>
                <div>
                    <div class="text-sm font-medium text-white/80">Vous deviendrez Owner</div>
                    <div class="text-xs text-white/35 mt-0.5 leading-relaxed">Contrôle total : inviter, retirer des membres, gérer les catégories et annuler la colocation.</div>
                </div>
            </div>
        </div>

        <!-- ════ RIGHT PANEL — FORM ════ -->
        <div class="bg-white border-l border-sand flex items-center justify-center py-10 px-6 md:px-12">
            <div class="w-full max-w-md">

                <!-- Header -->
                <div class="mb-7">
                    <div class="text-[10px] uppercase tracking-[0.12em] text-amber font-semibold mb-1.5">Nouvelle colocation</div>
                    <h2 class="font-display text-3xl font-semibold text-ink tracking-tight">Créer ma colocation</h2>
                    <p class="text-sm text-muted mt-1.5 leading-relaxed">Renseignez les informations de votre logement partagé.</p>
                </div>

                <!-- Error block — PHP: @if($errors->any()) remove hidden @endif -->

                @if(session('error'))
                <div class=" bg-red-50 border border-red-200 rounded-lg px-4 py-3 text-sm text-red-700 mb-5">
                    {{ session('error') }}
                </div>
                @endif


                <form method="POST" action="{{ route('create') }}" class="flex flex-col gap-5">
                    @csrf
                    <!-- Nom -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="name" class="text-xs font-semibold text-ink-2 uppercase tracking-wide">
                                Nom de la colocation <span class="text-amber">*</span>
                            </label>
                            <span class="text-[10px] text-muted" id="name-hint">0 / 60</span>
                        </div>
                        <input
                            type="text" id="name" name="name"
                            placeholder="Ex: Appartement Saint-Michel…"
                            maxlength="60" required
                            oninput="document.getElementById('name-hint').textContent = this.value.length + ' / 60'"
                            class="w-full px-4 py-3 rounded-xl border border-sand bg-canvas text-sm text-ink transition-colors"
                            value="">
                        @error('name')
                        <p class="text-xs text-red-600 mt-1">{{ $errors->first('name') }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="description" class="text-xs font-semibold text-ink-2 uppercase tracking-wide">Description</label>
                            <span class="text-[10px] text-muted" id="desc-hint">0 / 200</span>
                        </div>
                        <textarea
                            id="description" name="description"
                            placeholder="Ex: 3 pièces, 2ème étage, charges comprises…"
                            maxlength="200" rows="3"
                            oninput="document.getElementById('desc-hint').textContent = this.value.length + ' / 200'"
                            class="w-full px-4 py-3 rounded-xl border border-sand bg-canvas text-sm text-ink transition-colors leading-relaxed"></textarea>
                    </div>

                    <!-- Adresse -->
                    <div>
                        <label for="address" class="block text-xs font-semibold text-ink-2 uppercase tracking-wide mb-1.5">
                            Adresse <span class="text-amber">*</span>
                        </label>
                        <input
                            type="text" id="address" name="address"
                            placeholder="Numéro et nom de rue"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-sand bg-canvas text-sm text-ink transition-colors"
                            value="">
                    </div>

                    <!-- Ville + Code postal -->


                    <!-- Capacité -->
                    <div>
                        <div class="flex items-center justify-between mb-1.5">
                            <label for="max_members" class="text-xs font-semibold text-ink-2 uppercase tracking-wide">
                                Capacité max <span class="text-amber">*</span>
                            </label>
                            <span class="text-[10px] text-muted">vous inclus</span>
                        </div>
                        <select
                            id="max_members" name="capacite"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-sand bg-canvas text-sm text-ink transition-colors">
                            <option value="" disabled selected>Choisir…</option>
                            <option value="2">2 personnes</option>
                            <option value="3">3 personnes</option>
                            <option value="4">4 personnes</option>
                            <option value="5">5 personnes</option>
                            <option value="6">6 personnes</option>
                            <option value="7">7 personnes</option>
                            <option value="8">8 personnes</option>
                            <option value="9">9 personnes</option>
                            <option value="10">10 personnes</option>
                        </select>
                    </div>

                    <!-- Divider -->
                    <div class="h-px bg-sand"></div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full bg-amber hover:bg-[#a8660f] text-white font-semibold text-sm py-3.5 rounded-xl transition-all flex items-center justify-center gap-2 group">
                        Créer la colocation
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </button>

                </form>

                <p class="text-center text-xs text-muted mt-5">
                    Vous avez un lien d'invitation ?
                    <a href="join-colocation.html" class="text-amber font-medium hover:underline">Rejoindre une colocation</a>
                </p>

            </div>
        </div>

    </div>

</body>

</html>