<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoLoc — Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,700;1,9..144,300;1,9..144,500&family=Epilogue:wght@300;400;500;600&display=swap" rel="stylesheet">
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
                            glow: '#D4900A',
                            bright: '#F2A922',
                        },
                        teal: {
                            glow: '#1A8A7C'
                        },
                        surface: '#161410',
                        canvas: '#0E0C09',
                    },
                    animation: {
                        'blob': 'blob 18s ease-in-out infinite alternate',
                        'blob2': 'blob 22s ease-in-out infinite alternate-reverse',
                        'blob3': 'blob 16s ease-in-out infinite alternate',
                        'pulse-dot': 'pulseDot 2s ease-in-out infinite',
                        'fade-up': 'fadeUp 0.7s ease both',
                        'scroll-line': 'scrollLine 2s ease-in-out infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': {
                                transform: 'translate(0,0) scale(1)'
                            },
                            '100%': {
                                transform: 'translate(40px,30px) scale(1.08)'
                            },
                        },
                        pulseDot: {
                            '0%,100%': {
                                opacity: '1',
                                transform: 'scale(1)'
                            },
                            '50%': {
                                opacity: '0.4',
                                transform: 'scale(1.6)'
                            },
                        },
                        fadeUp: {
                            from: {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            to: {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        scrollLine: {
                            '0%,100%': {
                                opacity: '0.3',
                                transform: 'scaleY(1)'
                            },
                            '50%': {
                                opacity: '0.8',
                                transform: 'scaleY(1.25)'
                            },
                        },
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Epilogue', sans-serif;
        }

        .font-display {
            font-family: 'Fraunces', serif;
        }

        /* Delay utilities */
        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }

        .delay-800 {
            animation-delay: 0.8s;
        }

        /* Grain overlay */
        .grain::after {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            opacity: 0.3;
        }
    </style>
</head>

<body class="bg-canvas text-[#F7F3EC] overflow-x-hidden grain">

    <!-- ─── AMBIENT BLOBS ─── -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0" aria-hidden="true">
        <div class="animate-blob absolute -top-48 -left-48 w-[600px] h-[600px] rounded-full bg-amber-glow opacity-[0.16] blur-[120px]"></div>
        <div class="animate-blob2 absolute -bottom-24 -right-24 w-[500px] h-[500px] rounded-full bg-teal-glow opacity-[0.14] blur-[120px]"></div>
        <div class="animate-blob3 absolute top-1/2 left-1/2 w-[320px] h-[320px] rounded-full bg-amber-bright opacity-[0.08] blur-[100px]"></div>
    </div>

    <!-- ═══════════════════════════════════
       NAVBAR
  ═══════════════════════════════════ -->
    <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-6 md:px-10 py-5"
        style="background: linear-gradient(to bottom, rgba(14,12,9,0.92) 0%, transparent 100%); backdrop-filter: blur(0px)">

        <!-- Logo -->
        <a href="#" class="font-display text-2xl font-bold text-[#F7F3EC] tracking-tight no-underline">
            Co<em class="not-italic font-light text-amber-glow">Loc</em>
        </a>

    </nav>

    <!-- ═══════════════════════════════════
       SECTION 1 — HERO
  ═══════════════════════════════════ -->
    <section class="relative z-10 min-h-screen flex flex-col items-center justify-center text-center px-5 pt-28 pb-16">
        @if(session('success'))
        <div class="relative mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
            <span class="absolute top-0 right-0 text-red-500 cursor-pointer" onclick="this.parentElement.style.display='none'">X</span>
        </div>

        @endif
        @if(session('error'))
        <div class="relative mb-4 px-4 py-2 bg-red-100 text-red-800 rounded">
            {{ session('error') }}
            <span class="absolute top-0 right-0 text-red-500 cursor-pointer" onclick="this.parentElement.style.display='none'">X</span>
        </div>

        @endif

        <!-- Eyebrow badge -->
        <div class="animate-fade-up inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-medium tracking-widest uppercase text-amber-glow border border-amber-glow/25 bg-amber-glow/10 mb-8">
            <span class="animate-pulse-dot w-1.5 h-1.5 rounded-full bg-amber-glow inline-block"></span>
            Votre nouvelle colocation commence ici
        </div>

        <!-- Title -->
        <h1 class="animate-fade-up delay-100 font-display font-bold text-[#F7F3EC] leading-[0.95] tracking-[-0.04em] max-w-3xl mb-4"
            style="font-size: clamp(3rem, 7vw, 6.5rem)">
            Vivez ensemble,
            <span class="block">
                gérez <em class="font-light not-italic text-amber-bright">simplement</em>
            </span>
        </h1>

        <!-- Subtitle -->
        <p class="animate-fade-up delay-200 text-base md:text-lg text-[rgba(247,243,236,0.42)] leading-relaxed max-w-md mx-auto mt-6 mb-10">
            Créez votre colocation, invitez vos colocataires et laissez CoLoc s'occuper du reste — dépenses, remboursements, réputation.
        </p>

        <!-- CTA Cards -->
        <div class="animate-fade-up delay-300 grid grid-cols-1 sm:grid-cols-2 gap-3 w-full max-w-[580px]">

            <!-- Create -->
            <a href="{{route('colocation')}}"
                class="group relative overflow-hidden rounded-2xl p-6 text-left transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_60px_rgba(212,144,10,0.3)]"
                style="background: #D4900A">
                <!-- Shine overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-white/15 to-transparent pointer-events-none"></div>

                <span class="text-3xl block mb-4 relative z-10">🏠</span>
                <div class="font-display font-bold text-xl text-[#1A0E00] mb-1.5 relative z-10 tracking-tight">Créer une colocation</div>
                <div class="text-sm text-[rgba(26,14,0,0.58)] leading-relaxed relative z-10">Lancez votre espace en quelques secondes et devenez Owner.</div>
                <div class="inline-flex items-center gap-1.5 mt-4 text-xs font-semibold text-[#1A0E00] relative z-10 transition-[gap] duration-200 group-hover:gap-3">
                    Commencer <span>→</span>
                </div>
            </a>

            <!-- Join -->
            <a href="join-colocation.html"
                class="group relative overflow-hidden rounded-2xl p-6 text-left transition-all duration-300 hover:-translate-y-1 hover:border-white/20 hover:shadow-[0_20px_60px_rgba(0,0,0,0.4)]"
                style="background: #161410; border: 1px solid rgba(255,255,255,0.09)">
                <div class="absolute inset-0 bg-gradient-to-br from-white/[0.04] to-transparent pointer-events-none"></div>

                <span class="text-3xl block mb-4 relative z-10">🔗</span>
                <div class="font-display font-bold text-xl text-[#F7F3EC] mb-1.5 relative z-10 tracking-tight">Rejoindre via invitation</div>
                <div class="text-sm text-[rgba(247,243,236,0.4)] leading-relaxed relative z-10">Vous avez reçu un lien ou un code ? Entrez et rejoignez.</div>
                <div class="inline-flex items-center gap-1.5 mt-4 text-xs font-semibold text-amber-glow relative z-10 transition-[gap] duration-200 group-hover:gap-3">
                    J'ai un lien <span>→</span>
                </div>
            </a>

        </div>

        <!-- Scroll hint -->
        <div class="animate-fade-up delay-800 absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2">
            <div class="animate-scroll-line w-px h-8 bg-gradient-to-b from-white/20 to-transparent"></div>
            <span class="text-[10px] tracking-[0.14em] uppercase text-white/20">Découvrir</span>
        </div>

    </section>

    <!-- ═══════════════════════════════════
       SECTION 2 — HOW IT WORKS
  ═══════════════════════════════════ -->
    <section class="relative z-10 py-24 px-5" id="how">
        <div class="max-w-4xl mx-auto">

            <!-- Header -->
            <div class="flex items-center gap-3 text-[10px] uppercase tracking-[0.14em] text-amber-glow font-medium mb-4">
                <span class="block w-7 h-px bg-amber-glow"></span>
                Comment ça marche
            </div>
            <h2 class="font-display font-bold text-[#F7F3EC] leading-[1.05] tracking-[-0.03em] mb-3"
                style="font-size: clamp(2rem, 4vw, 3.25rem)">
                Trois étapes,
                <em class="font-light not-italic text-amber-bright"> zéro prise de tête</em>
            </h2>
            <p class="text-[rgba(247,243,236,0.4)] text-base leading-relaxed max-w-md mb-14">
                Que vous créiez ou rejoigniez une colocation, tout est pensé pour être rapide et clair.
            </p>

            <!-- Steps grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-white/[0.07] border border-white/[0.07] rounded-2xl overflow-hidden">

                <!-- Step 01 -->
                <div class="group bg-surface hover:bg-[#1C1A15] transition-colors duration-200 p-8">
                    <div class="font-display font-bold text-5xl text-amber-glow/15 leading-none mb-5 tracking-[-0.05em]">01</div>
                    <span class="text-2xl block mb-3">👤</span>
                    <div class="font-display font-bold text-lg text-[#F7F3EC] mb-2 tracking-tight"><a href="{{route('register')}}">Créez votre compte</a></div>
                    <p class="text-sm text-[rgba(247,243,236,0.4)] leading-relaxed mb-4">
                        Inscription en 30 secondes. Le premier inscrit sur la plateforme obtient automatiquement les droits d'admin global.
                    </p>
                    <span class="inline-block text-[10px] uppercase tracking-[0.08em] font-bold px-2 py-0.5 rounded border border-white/10 text-white/35">
                        Tous les utilisateurs
                    </span>
                </div>

                <!-- Step 02 -->
                <div class="group bg-surface hover:bg-[#1C1A15] transition-colors duration-200 p-8">
                    <div class="font-display font-bold text-5xl text-amber-glow/15 leading-none mb-5 tracking-[-0.05em]">02</div>
                    <span class="text-2xl block mb-3">🏠</span>
                    <div class="font-display font-bold text-lg text-[#F7F3EC] mb-2 tracking-tight">Créez ou rejoignez</div>
                    <p class="text-sm text-[rgba(247,243,236,0.4)] leading-relaxed mb-4">
                        Créez votre propre colocation et devenez Owner, ou rejoignez celle d'un ami via un lien d'invitation sécurisé.
                    </p>
                    <div class="flex gap-2 flex-wrap">
                        <span class="inline-block text-[10px] uppercase tracking-[0.08em] font-bold px-2 py-0.5 rounded border border-amber-glow/25 bg-amber-glow/10 text-amber-glow">
                            Owner
                        </span>
                        <span class="inline-block text-[10px] uppercase tracking-[0.08em] font-bold px-2 py-0.5 rounded border border-teal-glow/30 bg-teal-glow/10 text-[#2BC4B0]">
                            Member
                        </span>
                    </div>
                </div>

                <!-- Step 03 -->
                <div class="group bg-surface hover:bg-[#1C1A15] transition-colors duration-200 p-8">
                    <div class="font-display font-bold text-5xl text-amber-glow/15 leading-none mb-5 tracking-[-0.05em]">03</div>
                    <span class="text-2xl block mb-3">💶</span>
                    <div class="font-display font-bold text-lg text-[#F7F3EC] mb-2 tracking-tight">Gérez les dépenses</div>
                    <p class="text-sm text-[rgba(247,243,236,0.4)] leading-relaxed mb-4">
                        Ajoutez les dépenses partagées et laissez CoLoc calculer automatiquement qui doit combien à qui.
                    </p>
                    <span class="inline-block text-[10px] uppercase tracking-[0.08em] font-bold px-2 py-0.5 rounded border border-white/10 text-white/35">
                        Tous les membres
                    </span>
                </div>

            </div>

        </div>
    </section>

</body>

</html>