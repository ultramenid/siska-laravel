<header class="w-full bg-nav relative z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="SISKA" class="h-10">
            </a>
            <nav class="flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-white text-sm font-medium hover:opacity-80">Home</a>
                <a href="{{ url('/tentang') }}" class="text-white text-sm font-medium hover:opacity-80">Tentang</a>
                <a href="{{ url('/map') }}" class="text-white text-sm font-medium hover:opacity-80">Peta</a>
                @if(session('username'))
                    <a href="{{ url('/data') }}" class="text-white text-sm font-medium hover:opacity-80">Data</a>
                @endif
                @if(!session('username'))
                    <a href="{{ url('/login') }}" class="text-white text-sm font-medium hover:opacity-80">Login</a>
                @else
                    <a href="{{ url('/logout') }}" class="text-white text-sm font-medium hover:opacity-80">Logout</a>
                @endif
            </nav>
        </div>
    </div>
</header>