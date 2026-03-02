 <aside class="w-64 bg-ink fixed top-0 left-0 bottom-0 flex flex-col z-20">

    <!-- Top -->
    <div class="px-6 py-7 border-b border-white/[0.07]">
      <div class="font-display text-[1.6rem] text-cream tracking-tight">
        Co<em class="not-italic text-amber">Loc</em>
      </div>
      <div class="text-[0.68rem] text-white/35 mt-1.5 uppercase tracking-wider">
        {{ Auth::user()->name }} · Owner
      </div>
    </div>

    <!-- Nav -->
    <nav class="flex-1 px-3 py-4 space-y-0.5">
      <div class="text-[0.6rem] uppercase tracking-[0.12em] text-white/25 px-3 pt-2 pb-1">Navigation</div>

      <a href="{{ route('Owner_dashboard') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg bg-amber text-white text-sm font-medium">
        <span class="w-4 text-center">⊞</span> Dashboard
      </a>
      <a href="{{ route('depenses') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center">💶</span> Dépenses
      </a>
      <a href="{{ route('logout') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-white/50 text-sm hover:bg-white/[0.06] hover:text-white/85 transition-all">
        <span class="w-4 text-center"> 🚪</span> Log Out
      </a>
    </nav>

    <!-- User -->
    <div class="px-5 py-4 border-t border-white/[0.07] flex items-center gap-3">
      <div class="w-8 h-8 rounded-full bg-amber flex items-center justify-center text-white text-xs font-semibold flex-shrink-0">MD</div>
      <div>
        <div class="text-white/80 text-sm font-medium">{{ Auth::user()->name }}</div>
        <div class="text-white/30 text-[0.65rem] mt-0.5">👑 {{ $colocMember->role }}</div>
      </div>
    </div>
  </aside>
