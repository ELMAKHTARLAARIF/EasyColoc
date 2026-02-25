<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        dm: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        accent: '#e8ff47',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#0a0a0f] text-white font-dm min-h-screen flex items-center justify-center p-6">

    <!-- Grid background -->
    <div class="fixed inset-0 bg-[linear-gradient(rgba(232,255,71,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(232,255,71,0.03)_1px,transparent_1px)] bg-[size:48px_48px] pointer-events-none"></div>
    <!-- Glow -->
    <div class="fixed w-[600px] h-[600px] rounded-full bg-[radial-gradient(circle,rgba(232,255,71,0.07),transparent_70%)] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none animate-pulse"></div>

    <div class="relative z-10 w-full max-w-md bg-[#111118] border border-[#1e1e2e] p-10 rounded-sm">

        <!-- Corner accents -->
        <span class="absolute top-0 left-0 w-3 h-3 border-t-2 border-l-2 border-accent"></span>
        <span class="absolute bottom-0 right-0 w-3 h-3 border-b-2 border-r-2 border-accent"></span>

        <!-- Badge -->
        <span class="inline-block font-syne text-[10px] font-bold tracking-[0.2em] uppercase text-accent bg-[rgba(232,255,71,0.1)] border border-[rgba(232,255,71,0.2)] px-3 py-1 mb-5">
            New Account
        </span>

        <h1 class="font-syne text-4xl font-extrabold leading-tight tracking-tight mb-2">
            Create your<br>account.
        </h1>
        <p class="text-[#666680] text-sm mb-8">Join us — it only takes a moment.</p>

        <form method="POST" action="{{ route('store_user') }}" class="space-y-5">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block text-[11px] font-medium tracking-[0.12em] uppercase text-[#666680] mb-2">
                    Full Name
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="John Doe"
                    autocomplete="name"
                    class="w-full bg-[#0a0a0f] border {{ $errors->has('name') ? 'border-red-500' : 'border-[#1e1e2e]' }} text-white text-sm px-4 py-3 rounded-sm outline-none focus:border-accent focus:ring-2 focus:ring-[rgba(232,255,71,0.08)] transition placeholder-[#333345]"
                >
                @error('name')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-[11px] font-medium tracking-[0.12em] uppercase text-[#666680] mb-2">
                    Email Address
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="you@example.com"
                    autocomplete="email"
                    class="w-full bg-[#0a0a0f] border {{ $errors->has('email') ? 'border-red-500' : 'border-[#1e1e2e]' }} text-white text-sm px-4 py-3 rounded-sm outline-none focus:border-accent focus:ring-2 focus:ring-[rgba(232,255,71,0.08)] transition placeholder-[#333345]"
                >
                @error('email')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-[11px] font-medium tracking-[0.12em] uppercase text-[#666680] mb-2">
                    Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="new-password"
                    oninput="checkStrength(this.value)"
                    class="w-full bg-[#0a0a0f] border {{ $errors->has('password') ? 'border-red-500' : 'border-[#1e1e2e]' }} text-white text-sm px-4 py-3 rounded-sm outline-none focus:border-accent focus:ring-2 focus:ring-[rgba(232,255,71,0.08)] transition placeholder-[#333345]"
                >
                <!-- Strength bar -->
                <div class="flex gap-1 mt-2" id="strengthBar">
                    <span id="s1" class="flex-1 h-[3px] bg-[#1e1e2e] rounded-full transition-all duration-300"></span>
                    <span id="s2" class="flex-1 h-[3px] bg-[#1e1e2e] rounded-full transition-all duration-300"></span>
                    <span id="s3" class="flex-1 h-[3px] bg-[#1e1e2e] rounded-full transition-all duration-300"></span>
                    <span id="s4" class="flex-1 h-[3px] bg-[#1e1e2e] rounded-full transition-all duration-300"></span>
                </div>
                <p class="text-[#666680] text-[11px] mt-1.5">Minimum 8 characters</p>
                @error('password')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-[11px] font-medium tracking-[0.12em] uppercase text-[#666680] mb-2">
                    Confirm Password
                </label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="••••••••"
                    autocomplete="new-password"
                    class="w-full bg-[#0a0a0f] border border-[#1e1e2e] text-white text-sm px-4 py-3 rounded-sm outline-none focus:border-accent focus:ring-2 focus:ring-[rgba(232,255,71,0.08)] transition placeholder-[#333345]"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-accent text-[#0a0a0f] font-syne font-bold text-xs tracking-[0.15em] uppercase py-3.5 rounded-sm hover:bg-yellow-200 active:scale-[0.99] transition mt-2"
            >
                Create Account →
            </button>
        </form>

        <p class="text-center text-[#666680] text-sm mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-accent font-medium hover:underline">Sign in</a>
        </p>
    </div>

    <script>
        const colors = {
            weak:   ['bg-red-500',    null,          null,           null],
            fair:   ['bg-orange-400', 'bg-orange-400', null,         null],
            good:   ['bg-teal-400',   'bg-teal-400', 'bg-teal-400',  null],
            strong: ['bg-[#e8ff47]',  'bg-[#e8ff47]','bg-[#e8ff47]','bg-[#e8ff47]'],
        };

        function checkStrength(val) {
            const bars = [document.getElementById('s1'), document.getElementById('s2'), document.getElementById('s3'), document.getElementById('s4')];
            bars.forEach(b => b.className = 'flex-1 h-[3px] bg-[#1e1e2e] rounded-full transition-all duration-300');
            if (!val) return;
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;
            const level = ['', 'weak', 'fair', 'good', 'strong'][score];
            if (!level) return;
            colors[level].forEach((cls, i) => {
                if (cls) bars[i].classList.add(...cls.split(' '), 'transition-all', 'duration-300');
            });
        }
    </script>

</body>
</html>