<header class="w-full bg-nav relative z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="SISKA" class="h-10">
            </a>

            {{-- Desktop nav --}}
            <nav class="hidden sm:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-white text-sm font-medium hover:opacity-80">Home</a>
                <a href="{{ url('/tentang') }}" class="text-white text-sm font-medium hover:opacity-80">Tentang</a>
                <a href="{{ url('/map') }}" class="text-white text-sm font-medium hover:opacity-80">Peta</a>
                @if(session('username'))
                    <a href="{{ url('/data') }}" class="text-white text-sm font-medium hover:opacity-80">Data</a>
                    <a href="{{ url('/logout') }}" class="text-white text-sm font-medium hover:opacity-80">Logout</a>
                @else
                    <a href="{{ url('/login') }}" class="text-white text-sm font-medium hover:opacity-80">Login</a>
                @endif
            </nav>

            {{-- Mobile hamburger --}}
            <div class="sm:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="text-white focus:outline-hidden">
                    <svg x-show="!open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{-- Mobile menu --}}
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     @click.outside="open = false"
                     class="absolute top-16 left-0 right-0 bg-nav shadow-lg z-50 px-6 py-4 space-y-3"
                     style="display: none;">
                    <a href="{{ url('/') }}" class="block text-white text-sm font-medium py-2 border-b border-white border-opacity-10">Home</a>
                    <a href="{{ url('/tentang') }}" class="block text-white text-sm font-medium py-2 border-b border-white border-opacity-10">Tentang</a>
                    <a href="{{ url('/map') }}" class="block text-white text-sm font-medium py-2 border-b border-white border-opacity-10">Peta</a>
                    @if(session('username'))
                        <a href="{{ url('/data') }}" class="block text-white text-sm font-medium py-2 border-b border-white border-opacity-10">Data</a>
                        <a href="{{ url('/logout') }}" class="block text-white text-sm font-medium py-2">Logout</a>
                    @else
                        <a href="{{ url('/login') }}" class="block text-white text-sm font-medium py-2">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
