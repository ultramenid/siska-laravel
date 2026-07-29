<footer class="bg-ink text-white/70 mt-auto">
    <div class="max-w-[110rem] mx-auto px-5 sm:px-8 py-12 lg:py-16">

        <div class="grid gap-10 lg:grid-cols-[1.5fr_1fr_1fr]">

            <div class="max-w-md">
                <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="" class="h-10 w-auto mb-5">
                <h2 class="font-display text-xl font-bold text-white leading-tight tracking-tight">
                    Dinas Perkebunan<br>Provinsi Kalimantan Tengah
                </h2>
                <address class="mt-3 not-italic text-sm leading-relaxed text-white/55">
                    Jl. Jenderal Soedirman No. 18, Jekan Raya,<br>
                    Palangka Raya, Kalimantan Tengah 74874
                </address>
            </div>

            <nav aria-labelledby="footer-nav-title">
                <p id="footer-nav-title" class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/40 mb-4">Jelajahi</p>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ url('/map') }}" class="text-white/70 hover:text-white transition-colors">Peta perkebunan</a></li>
                    <li><a href="{{ url('/data') }}" class="text-white/70 hover:text-white transition-colors">Tabel data</a></li>
                    <li><a href="{{ url('/tentang') }}" class="text-white/70 hover:text-white transition-colors">Tentang SISKA</a></li>
                </ul>
            </nav>


        </div>

        <div class="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/40">
                SISKA &middot; Sistem Informasi Komoditas Perkebunan
            </p>
            <p class="font-mono text-[0.6875rem] uppercase tracking-[0.14em] text-white/40">
                &copy; {{ date('Y') }} Disbun Kalteng
            </p>
        </div>
    </div>
</footer>
