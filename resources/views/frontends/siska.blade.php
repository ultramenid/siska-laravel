@extends('layouts.indexLayout')

@section('content')
    <section class="w-full">
        @include('partials.navMobile')
        @include('partials.nav')

        <div class="max-w-3xl mx-auto px-6">
            <div class="pt-20 pb-16 text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-6">Tentang SISKA</h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    Sistem Informasi Komoditas Perkebunan Kalimantan Tengah merupakan platform yang menyajikan data dan informasi mengenai komoditas perkebunan meliputi perkebunan sawit, karet, kelapa, lada, kopi, kakau, pinang, aren, jambu mete, kemiri, kapuk randu, dan cengkeh yang ada di Provinsi Kalimantan Tengah.
                </p>
            </div>

            <div class="mb-20">
                <h2 class="text-2xl font-semibold text-gray-900 mb-8">Tujuan</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Mendukung penerapan decision support system untuk perencanaan, pengawasan dan pengendalian usaha perkebunan di Kalimantan Tengah yang terukur, berkeadilan dan berkelanjutan.
                </p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Terukur</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perencanaan, pengendalian dan pengawasan perkebunan akan lebih terukur dengan basis data yang kredibel dan terintegrasi.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Berkeadilan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Perkembangan usaha perkebunan tidak hanya fokus pada perkebunan skala besar namun juga berdampak langsung pada perkebunan rakyat.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Berkelanjutan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">Pengembangan perkebunan selaras dengan daya dukung dan daya tampung lingkungan sebagai bentuk komitmen pembangunan berkelanjutan.</p>
                    </div>
                </div>
            </div>

            <div class="mb-20">
                <h2 class="text-2xl font-semibold text-gray-900 mb-8">Produk & Pengguna</h2>
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

            <div class="mb-20">
                <h2 class="text-2xl font-semibold text-gray-900 mb-8">Manfaat</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Pemerintah Daerah</h3>
                        <p class="text-gray-600 text-sm">Memudahkan Pemerintah Provinsi dan Kabupaten/Kota menghimpun dan menyajikan data secara cepat untuk mendukung perencanaan, pengawasan dan pengendalian perizinan.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Pemerintah Pusat</h3>
                        <p class="text-gray-600 text-sm">Memudahkan Pemerintah Pusat mengintegrasikan data untuk pengawasan kepatuhan perizinan, kewajiban keuangan dan lingkungan.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-6">
                        <h3 class="text-base font-semibold text-gray-900 mb-2">Pelaku Usaha</h3>
                        <p class="text-gray-600 text-sm">Memungkinkan Pelaku Usaha untuk mengidentifikasi potensi pasokan bahan baku dan pengawasan rantai pasok dari perkebunan rakyat.</p>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection