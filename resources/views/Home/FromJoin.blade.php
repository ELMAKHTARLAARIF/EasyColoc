@include('header.headerHome')

  <section class="relative z-10 min-h-[calc(100vh-80px)] flex flex-col items-center justify-center px-5 pb-16">

    {{-- @if(session('error')) --}}
    <div class="animate-fade-up mb-6 w-full max-w-sm flex items-center gap-3 bg-red-500/10 border border-red-500/25 text-red-400 text-sm rounded-xl px-4 py-3 hidden">
      <span>⚠️</span><span>{{-- {{ session('error') }} --}}</span>
      <button onclick="this.parentElement.remove()" class="ml-auto text-red-400/50 hover:text-red-400 leading-none">✕</button>
    </div>
    {{-- @endif --}}

    <div class="animate-fade-up inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-medium tracking-widest uppercase text-amber-glow border border-amber-glow/25 bg-amber-glow/10 mb-7">
      <span class="animate-pulse-dot w-1.5 h-1.5 rounded-full bg-amber-glow inline-block"></span>
      Rejoindre une colocation
    </div>

    <h1 class="animate-fade-up delay-100 font-display font-bold text-[#F7F3EC] leading-[0.95] tracking-[-0.04em] text-center mb-3" style="font-size:clamp(2.2rem,5vw,4rem)">
      Entrez votre <em class="font-light not-italic text-amber-bright">token</em>
    </h1>
    <p class="animate-fade-up delay-200 text-sm text-[rgba(247,243,236,0.35)] mb-10 text-center">
      Vous avez reçu un token par email — collez-le ci-dessous.
    </p>

    <div class="animate-fade-up delay-300 w-full max-w-sm">
      <div class="relative rounded-2xl p-px" style="background:linear-gradient(135deg,rgba(212,144,10,0.3),rgba(255,255,255,0.05) 50%,rgba(255,255,255,0.02))">
        <div class="rounded-2xl px-7 py-7" style="background:#16140F;">

           <form method="POST" action="{{ route('invitation.join') }}">
            @csrf
          <form method="POST" action="/join" id="join-form">

            <label class="block text-[0.65rem] uppercase tracking-[0.14em] text-white/30 font-medium mb-2.5">
              Token d'invitation <span class="text-amber-glow">*</span>
            </label>

            <input
              type="text"
              name="token"
              id="token"
              placeholder="Collez votre token ici…"
              required
              autocomplete="off"
              spellcheck="false"
              class="text-black token-input w-full px-4 py-3 rounded-xl text-sm mb-1.5"
            >

             @error('token') 
            <p class="text-xs text-red-400 mb-3">{{ $message }}</p>
            @else 
            <p class="text-[0.65rem] text-white/20 mb-5">Ressemble à : <span class="font-mono">xK9mP2rTqZ...</span></p>
             @enderror
            <button type="submit" id="submit-btn"
              class="w-full py-3 rounded-xl text-sm font-semibold transition-all flex items-center justify-center gap-2 group"
              style="background:#D4900A;color:#1A0E00;"
              onmouseover="this.style.background='#B45309'"
              onmouseout="this.style.background='#D4900A'">
              Rejoindre
              <span class="group-hover:translate-x-1 transition-transform">→</span>
            </button>

          </form>
        </div>
      </div>

      <p class="text-center text-xs text-white/20 mt-5">
        Pas de token ? Demandez à l'Owner de vous envoyer une invitation.
      </p>
    </div>

  </section>

  <script>
    document.getElementById('join-form').addEventListener('submit', function() {
      const btn = document.getElementById('submit-btn');
      btn.innerHTML = '⏳ Vérification…';
      btn.disabled = true;
      btn.style.opacity = '0.65';
    });
  </script>
</body>
</html>