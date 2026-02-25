<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            Secure Access
        </span>

        <h1 class="font-syne text-4xl font-extrabold leading-tight tracking-tight mb-2">
            Welcome<br>back.
        </h1>
        <p class="text-[#666680] text-sm mb-8">Sign in to your account to continue.</p>

        @if(session('success'))
            <div class="bg-[rgba(232,255,71,0.07)] border border-[rgba(232,255,71,0.2)] text-accent text-sm px-4 py-3 rounded-sm mb-5">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->has('login_error'))
            <div class="bg-[rgba(255,92,92,0.08)] border border-[rgba(255,92,92,0.25)] text-red-400 text-sm px-4 py-3 rounded-sm mb-5">
                {{ $errors->first('login_error') }}
            </div>
        @endif

        <form method="POST" action="{{route('CheckloginData')}}" class="space-y-5">
            @csrf

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

            <div>
                <label for="password" class="block text-[11px] font-medium tracking-[0.12em] uppercase text-[#666680] mb-2">
                    Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="current-password"
                    class="w-full bg-[#0a0a0f] border {{ $errors->has('password') ? 'border-red-500' : 'border-[#1e1e2e]' }} text-white text-sm px-4 py-3 rounded-sm outline-none focus:border-accent focus:ring-2 focus:ring-[rgba(232,255,71,0.08)] transition placeholder-[#333345]"
                >
                @error('password')
                    <p class="text-red-400 text-xs mt-1.5">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-accent text-[#0a0a0f] font-syne font-bold text-xs tracking-[0.15em] uppercase py-3.5 rounded-sm hover:bg-yellow-200 active:scale-[0.99] transition mt-2"
            >
                Sign In →
            </button>
        </form>

        <p class="text-center text-[#666680] text-sm mt-6">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-accent font-medium hover:underline">Create one</a>
        </p>
    </div>

</body>
</html>