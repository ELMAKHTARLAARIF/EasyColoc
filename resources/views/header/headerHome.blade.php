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
        <a href="{{route('home')}}" class="text-sm font-medium text-amber-glow hover:text-amber-bright transition-colors">Accueil</a>

    </nav>