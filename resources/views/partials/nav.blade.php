@php
    $navLinks = [
        ['label' => 'Beranda', 'url' => url('/'),                'active' => request()->is('/')],
        ['label' => 'Peta',    'url' => url('/map'),             'active' => request()->is('map')],
        ['label' => 'Data',    'url' => url('/data'),            'active' => request()->is('data')],
        ['label' => 'Tentang', 'url' => url('/tentang'),         'active' => request()->is('tentang')],
    ];
@endphp

<header class="relative z-50 bg-ink border-b border-ink-line shrink-0" x-data="{ open: false }">
    <div class="max-w-[110rem] mx-auto px-5 sm:px-8">
        <div class="flex items-center justify-between h-16 gap-6">

            <a href="{{ url('/') }}" class="flex items-center gap-3 shrink-0" aria-label="SISKA — beranda">
                <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="" class="h-9 w-auto">
            </a>

            {{-- Desktop --}}
            <nav class="hidden md:flex items-center gap-1" aria-label="Navigasi utama">
                @foreach ($navLinks as $link)
                    <a href="{{ $link['url'] }}"
                       @if($link['active']) aria-current="page" @endif
                       class="relative px-3 py-2 font-mono text-[0.6875rem] uppercase tracking-[0.14em] transition-colors
                              {{ $link['active'] ? 'text-white' : 'text-white/55 hover:text-white' }}">
                        {{ $link['label'] }}
                        @if($link['active'])
                            <span class="absolute left-3 right-3 -bottom-px h-px bg-cpo"></span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <div class="hidden md:flex items-center gap-4 shrink-0">
                @if(session('username'))
                    <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/45">
                        {{ session('username') }}
                    </span>
                    <a href="{{ url('/logout') }}"
                       class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/55 hover:text-white transition-colors">
                        Keluar
                    </a>
                @else
                    <button type="button"
                            x-on:click="$dispatch('open-login')"
                            class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-ink bg-white px-4 py-2 rounded-sm hover:bg-cpo hover:text-white transition-colors">
                        Masuk
                    </button>
                @endif
            </div>

            {{-- Mobile toggle --}}
            <button type="button"
                    class="md:hidden p-2 -mr-2 text-white"
                    x-on:click="open = ! open"
                    :aria-expanded="open ? 'true' : 'false'"
                    aria-controls="nav-mobile"
                    aria-label="Buka menu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                    <path x-show="! open" stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/>
                    <path x-show="open" x-cloak stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div id="nav-mobile"
         x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-on:click.outside="open = false"
         class="md:hidden absolute inset-x-0 top-16 bg-ink border-b border-ink-line px-5 pb-5 pt-2">
        <nav class="flex flex-col" aria-label="Navigasi utama">
            @foreach ($navLinks as $link)
                <a href="{{ $link['url'] }}"
                   @if($link['active']) aria-current="page" @endif
                   class="flex items-center justify-between py-3 border-b border-white/10 font-mono text-xs uppercase tracking-[0.14em]
                          {{ $link['active'] ? 'text-white' : 'text-white/55' }}">
                    {{ $link['label'] }}
                    @if($link['active'])<span class="h-1 w-1 rounded-full bg-cpo"></span>@endif
                </a>
            @endforeach
        </nav>

        @if(session('username'))
            <div class="mt-4 flex items-center justify-between">
                <span class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/45">{{ session('username') }}</span>
                <a href="{{ url('/logout') }}" class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/70">Keluar</a>
            </div>
        @else
            <button type="button"
                    x-on:click="open = false; $dispatch('open-login')"
                    class="mt-4 w-full font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-ink bg-white px-4 py-2.5 rounded-sm">
                Masuk
            </button>
        @endif
    </div>
</header>
