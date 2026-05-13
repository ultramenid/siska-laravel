@extends('layouts.indexLayout')

@section('content')
    <section class="w-full">
        @include('partials.navMobile')
        @include('partials.nav')

        {{-- Hero --}}
        <div class="w-full flex items-center justify-center" style="background-color: #132822; min-height: 40vh;">
            <div class="text-center px-6 py-16">
                <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">Tentang SISKA</h1>
                <p class="text-white text-base sm:text-lg opacity-80">Sistem Informasi Komoditas Perkebunan Kalimantan Tengah</p>
            </div>
        </div>

        {{-- About --}}
        <div class="bg-white py-16">
            <div class="max-w-3xl mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-900">Tentang</h2>
                <div class="w-12 h-1 mt-2 mb-8" style="background-color: #009180;"></div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Sistem Informasi Komoditas Perkebunan Kalimantan Tengah merupakan platform yang menyajikan data dan informasi mengenai komoditas perkebunan meliputi perkebunan sawit, karet, kelapa, lada, kopi, kakao, pinang, aren, jambu mete, kemiri, kapuk randu, dan cengkeh yang ada di Provinsi Kalimantan Tengah.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Platform ini dikelola oleh Dinas Perkebunan Provinsi Kalimantan Tengah sebagai upaya mendukung transparansi dan aksesibilitas data perkebunan bagi seluruh pemangku kepentingan.
                </p>
            </div>
        </div>

        {{-- Tujuan --}}
        <div class="bg-gray-50 py-16">
            <div class="max-w-5xl mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-900">Tujuan</h2>
                <div class="w-12 h-1 mt-2 mb-8" style="background-color: #009180;"></div>
                <p class="text-gray-600 mb-10 leading-relaxed">
                    Mendukung penerapan decision support system untuk perencanaan, pengawasan dan pengendalian usaha perkebunan di Kalimantan Tengah yang terukur, berkeadilan dan berkelanjutan.
                </p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4" style="border-left-color: #009180;">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Terukur</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perencanaan, pengendalian dan pengawasan perkebunan akan lebih terukur dengan basis data yang kredibel dan terintegrasi.</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4" style="border-left-color: #009180;">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Berkeadilan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perkembangan usaha perkebunan tidak hanya fokus pada perkebunan skala besar namun juga berdampak langsung pada perkebunan rakyat.</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4" style="border-left-color: #009180;">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Berkelanjutan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Pengembangan perkebunan selaras dengan daya dukung dan daya tampung lingkungan sebagai bentuk komitmen pembangunan berkelanjutan.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Produk & Pengguna --}}
        <div class="bg-white py-16">
            <div class="max-w-5xl mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-900">Produk &amp; Pengguna</h2>
                <div class="w-12 h-1 mt-2 mb-8" style="background-color: #009180;"></div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Produk</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Basis data perizinan, pabrik, dan perkebunan rakyat yang disajikan dalam dashboard data dan peta yang memungkinkan pengguna mengakses dan mengeksplor perkembangan perkebunan berdasarkan kabupaten, subyek perizinan, status lahan dan lainnya.
                        </p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Pengguna</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Internal Dinas Perkebunan Provinsi Kalimantan Tengah, Instansi Pemerintah lainnya, dan Publik.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Manfaat --}}
        <div class="bg-gray-50 py-16">
            <div class="max-w-5xl mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-900">Manfaat</h2>
                <div class="w-12 h-1 mt-2 mb-8" style="background-color: #009180;"></div>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4" style="border-left-color: #009180;">
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Pemerintah Daerah</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Memudahkan Pemerintah Provinsi dan Kabupaten/Kota menghimpun dan menyajikan data secara cepat untuk mendukung perencanaan, pengawasan dan pengendalian perizinan.</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4" style="border-left-color: #009180;">
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Pemerintah Pusat</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Memudahkan Pemerintah Pusat mengintegrasikan data untuk pengawasan kepatuhan perizinan, kewajiban keuangan dan lingkungan.</p>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow-sm border-l-4" style="border-left-color: #009180;">
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Pelaku Usaha</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Memungkinkan Pelaku Usaha untuk mengidentifikasi potensi pasokan bahan baku dan pengawasan rantai pasok dari perkebunan rakyat.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- FAQ --}}
        <div class="bg-white py-16">
            <div class="max-w-3xl mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-900">FAQ</h2>
                <div class="w-12 h-1 mt-2 mb-8" style="background-color: #009180;"></div>

                <div class="divide-y divide-gray-200">
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex justify-between items-center py-4 text-left text-gray-900 font-medium focus:outline-none">
                            <span>Apa itu SISKA?</span>
                            <svg :class="open ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform duration-200 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="pb-4 text-gray-600 text-sm leading-relaxed">
                            SISKA adalah platform yang menyajikan data dan informasi perkembangan perkebunan sawit di Provinsi Kalimantan Tengah.
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex justify-between items-center py-4 text-left text-gray-900 font-medium focus:outline-none">
                            <span>Sumber Data?</span>
                            <svg :class="open ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform duration-200 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="pb-4 text-gray-600 text-sm leading-relaxed">
                            Data yang ditampilkan dalam SISKA bersumber dari Dinas Perkebunan Provinsi Kalimantan Tengah dan Dinas Perkebunan Kabupaten-Kota di Kalimantan Tengah.
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex justify-between items-center py-4 text-left text-gray-900 font-medium focus:outline-none">
                            <span>Bagaimana cara mengakses SISKA?</span>
                            <svg :class="open ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform duration-200 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="pb-4 text-gray-600 text-sm leading-relaxed">
                            Akses SISKA dibuka untuk publik. Akses kredensial (nama pengguna dan kata sandi) diberikan kepada instansi atau lembaga yang mengajukan akses kredensial. Akses ini diajukan secara formal kepada pengelola SISKA.
                        </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="w-full flex justify-between items-center py-4 text-left text-gray-900 font-medium focus:outline-none">
                            <span>Seberapa sering data diperbarui?</span>
                            <svg :class="open ? 'rotate-180' : ''" class="w-5 h-5 text-gray-500 transition-transform duration-200 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="open" x-transition class="pb-4 text-gray-600 text-sm leading-relaxed">
                            Pemutakhiran data dilakukan secara periodik. Data yang ditampilkan disertai dengan informasi waktu atau usia data.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection
