@extends('layouts.indexLayout')

@section('content')
    <section class="w-full">
        @include('partials.nav')

        {{-- Hero --}}
        <div class="w-full relative flex items-center justify-center" style="min-height: 28vh;">
            <img src="{{ asset('assets/v1/pekerbunanbesar.png') }}" alt="Data Perkebunan" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-60"></div>
            <div class="relative text-center px-6 py-12">
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-3">Data Perkebunan</h1>
                <p class="text-white text-base sm:text-lg opacity-80">Kalimantan Tengah</p>
            </div>
        </div>

        {{-- Content --}}
        <div class="max-w-7xl mx-auto px-4 py-10" x-data="{ sidenav: 'sawit' }">
            <div class="flex sm:flex-row flex-col gap-8">

                {{-- Sidenav --}}
                <div class="sm:w-48 w-full shrink-0">
                    <div class="sticky top-6">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest mb-3 px-2">Komoditas</p>
                        <nav class="flex sm:flex-col flex-row flex-wrap gap-1">
                            @foreach ([
                                'sawit'  => ['label' => 'Sawit',  'soon' => false],
                                'karet'  => ['label' => 'Karet',  'soon' => true],
                                'kelapa' => ['label' => 'Kelapa', 'soon' => true],
                                'lada'   => ['label' => 'Lada',   'soon' => true],
                                'kopi'   => ['label' => 'Kopi',   'soon' => true],
                                'kakao'  => ['label' => 'Kakao',  'soon' => true],
                            ] as $key => $item)
                            <button
                                @if(!$item['soon']) @click="sidenav = '{{ $key }}'" @endif
                                :class="sidenav === '{{ $key }}'
                                    ? 'text-white font-semibold'
                                    : '{{ $item['soon'] ? 'text-gray-300 cursor-not-allowed' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}'"
                                class="w-full text-left px-4 py-2 rounded-lg text-sm transition-colors duration-150 focus:outline-hidden"
                                :style="sidenav === '{{ $key }}' ? 'background-color: #132822;' : ''"
                                {{ $item['soon'] ? 'disabled' : '' }}
                            >
                                <span class="flex items-center justify-between gap-2">
                                    {{ $item['label'] }}
                                    @if($item['soon'])
                                    <span class="text-xs px-1.5 py-0.5 rounded-sm font-normal bg-gray-100 text-gray-400">soon</span>
                                    @endif
                                </span>
                            </button>
                            @endforeach
                        </nav>
                    </div>
                </div>

                {{-- Table Area --}}
                <div class="flex-1 min-w-0">
                    <div x-show="sidenav === 'sawit'" style="display: none !important;">
                        <livewire:table-sawit/>
                    </div>

                    @foreach (['karet' => 'Karet', 'kelapa' => 'Kelapa', 'lada' => 'Lada', 'kopi' => 'Kopi', 'kakao' => 'Kakao'] as $key => $label)
                    <div x-show="sidenav === '{{ $key }}'" style="display: none !important;">
                        <div class="flex flex-col items-center justify-center py-24 text-center">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center mb-4" style="background-color: #e6f4f2;">
                                <svg class="w-8 h-8" style="color: #009180;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-1">Data {{ $label }}</h3>
                            <p class="text-sm text-gray-400">Segera hadir</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection
