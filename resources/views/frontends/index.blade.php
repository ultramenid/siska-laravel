@extends('layouts.indexLayout')

@section('content')
    <section class="w-full min-h-screen flex flex-col">
        @include('partials.nav')

        {{-- Full-screen commodity grid --}}
        <div class="flex-1 grid grid-cols-2 sm:grid-cols-3 siska-grid">

            {{-- Sawit --}}
            <div
                x-data="{
                    open: false,
                    isMobile: window.innerWidth < 640,
                    handleClick() {
                        if (this.isMobile) {
                            if (this.open) {
                                window.location.href = '{{ url('/dashboard/sawit') }}';
                            } else {
                                this.open = true;
                            }
                        }
                    }
                }"
                @mouseenter="if (!isMobile) open = true"
                @mouseleave="if (!isMobile) open = false"
                @click="handleClick()"
                class="relative overflow-hidden cursor-pointer group"
            >
                <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                     style="background-image: url('{{ asset('assets/v1/sawitfull.png') }}');"></div>
                <div x-cloak class="absolute inset-0 bg-black transition-opacity duration-300"
                     :class="open ? 'opacity-75' : 'opacity-40'"></div>

                {{-- Default label --}}
                <div x-cloak class="relative z-10 flex flex-col items-center justify-center h-full p-4 transition-opacity duration-300"
                     :class="open ? 'opacity-0 pointer-events-none' : 'opacity-100'">
                    <span class="text-white text-xl sm:text-2xl lg:text-5xl font-bold tracking-wide drop-shadow-lg">Sawit</span>
                </div>

                {{-- Stats panel --}}
                <div x-cloak class="absolute inset-0 z-10 flex flex-col justify-between p-2 sm:p-5 transition-opacity duration-300"
                     :class="open ? 'opacity-100' : 'opacity-0 pointer-events-none'">
                    <div>
                        <h3 class="text-white font-bold mb-1 sm:mb-3 drop-shadow-sm text-[10px] lg:text-2xl">Sawit</h3>
                        <ul class="space-y-0.5 sm:space-y-1.5 lg:space-y-1.5 text-white text-[9px] lg:text-sm">
                            <li class="flex justify-between gap-1">
                                <span class="opacity-80">Perkebunan Sawit</span>
                                <span class="font-semibold">2.029.319 ha</span>
                            </li>
                            <li class="border-t border-white border-opacity-20 pt-0.5 sm:pt-1.5 flex justify-between gap-1">
                                <span class="opacity-80">Izin Usaha (280)</span>
                                <span class="font-semibold">2.936.486 ha</span>
                            </li>
                            <li class="border-t border-white border-opacity-20 pt-0.5 sm:pt-1.5 flex justify-between gap-1">
                                <span class="opacity-80">TM</span>
                                <span class="font-semibold">1.949.146 ha</span>
                            </li>
                            <li class="flex justify-between gap-1">
                                <span class="opacity-80">TBM</span>
                                <span class="font-semibold">13.319 ha</span>
                            </li>
                            <li class="flex justify-between gap-1">
                                <span class="opacity-80">TR</span>
                                <span class="font-semibold">66.854 ha</span>
                            </li>
                            <li class="border-t border-white border-opacity-20 pt-0.5 sm:pt-1.5 flex justify-between gap-1">
                                <span class="opacity-80">PBS</span>
                                <span class="font-semibold">1.731.586 ha</span>
                            </li>
                            <li class="flex justify-between gap-1">
                                <span class="opacity-80">PR</span>
                                <span class="font-semibold">297.733 ha</span>
                            </li>
                            <li class="flex justify-between gap-1">
                                <span class="opacity-80">Pabrik</span>
                                <span class="font-semibold">127 Unit</span>
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center justify-end mt-1 sm:mt-3">
                        <a href="{{ url('/dashboard/sawit') }}"
                           @click.stop
                           class="inline-block rounded-full border border-white/35 bg-white/15 text-emerald-50 font-semibold shadow-lg backdrop-blur-md hover:bg-white/25 transition-colors px-1.5 py-0.5 sm:px-2 sm:py-1 lg:px-3 lg:py-1.5 text-[8px] sm:text-[9px] lg:text-sm">
                            Selengkapnya &rarr;
                        </a>

                    </div>
                </div>
            </div>

            {{-- Karet --}}
            <div class="relative overflow-hidden cursor-not-allowed group">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/v1/karetfull.png') }}');"></div>
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 flex flex-col items-center justify-center h-full p-4 gap-2">
                    <span class="text-white text-xl sm:text-2xl lg:text-5xl font-bold tracking-wide drop-shadow-lg">Karet</span>
                    <span class="rounded-full border border-white/35 bg-white/15 text-emerald-50 text-xs font-medium shadow-lg backdrop-blur-md px-2.5 py-1">Segera hadir</span>
                </div>
            </div>

            {{-- Kelapa --}}
            <div class="relative overflow-hidden cursor-not-allowed group">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/v1/kelapafull.png') }}');"></div>
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 flex flex-col items-center justify-center h-full p-4 gap-2">
                    <span class="text-white text-xl sm:text-2xl lg:text-5xl font-bold tracking-wide drop-shadow-lg">Kelapa</span>
                    <span class="rounded-full border border-white/35 bg-white/15 text-emerald-50 text-xs font-medium shadow-lg backdrop-blur-md px-2.5 py-1">Segera hadir</span>
                </div>
            </div>

            {{-- Lada --}}
            <div class="relative overflow-hidden cursor-not-allowed group">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/v1/ladafull.png') }}');"></div>
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 flex flex-col items-center justify-center h-full p-4 gap-2">
                    <span class="text-white text-xl sm:text-2xl lg:text-5xl font-bold tracking-wide drop-shadow-lg">Lada</span>
                    <span class="rounded-full border border-white/35 bg-white/15 text-emerald-50 text-xs font-medium shadow-lg backdrop-blur-md px-2.5 py-1">Segera hadir</span>
                </div>
            </div>

            {{-- Kopi --}}
            <div class="relative overflow-hidden cursor-not-allowed group">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/v1/kopifull.png') }}');"></div>
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 flex flex-col items-center justify-center h-full p-4 gap-2">
                    <span class="text-white text-xl sm:text-2xl lg:text-5xl font-bold tracking-wide drop-shadow-lg">Kopi</span>
                    <span class="rounded-full border border-white/35 bg-white/15 text-emerald-50 text-xs font-medium shadow-lg backdrop-blur-md px-2.5 py-1">Segera hadir</span>
                </div>
            </div>

            {{-- Kakao --}}
            <div class="relative overflow-hidden cursor-not-allowed group">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('assets/v1/kakaufull.png') }}');"></div>
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 flex flex-col items-center justify-center h-full p-4 gap-2">
                    <span class="text-white text-xl sm:text-2xl lg:text-5xl font-bold tracking-wide drop-shadow-lg">Kakao</span>
                    <span class="rounded-full border border-white/35 bg-white/15 text-emerald-50 text-xs font-medium shadow-lg backdrop-blur-md px-2.5 py-1">Segera hadir</span>
                </div>
            </div>

        </div>
    </section>
@endsection
