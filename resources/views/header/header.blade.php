    <header class="bg-white border-b border-stone-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
      <div>
        <h1 class="font-display text-[1.4rem] font-semibold text-ink leading-tight">Welcome {{ Auth::user()->name }}</h1>
        <p class="text-sm text-muted mt-0.5">{{$colocMember->colocation->name }} · Créée le {{ $colocMember->colocation->created_at->format('d M Y') }}</p>
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