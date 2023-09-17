@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')
        <div class="flex justify-center max-w-3xl mx-auto sm:mt-32 py-4 px-4">
            <p class="mb-4 leading-relaxed">Sistem Informasi Komoditas Perkebunan Kalimantan Tengah merupakan platform yang menyajikan data dan informasi mengenai komoditas perkebunan meliputi perkebunan sawit, karet, kelapa, lada, kopi, kakau, pinang, aren, jambu mete, kemiri, kapuk randu, dan cengkeh yang ada di Provinsi Kalimantan Tengah. Platform ini merupakan inisiatif pemerintah provinsi yang dibangun sejak 2022 untuk sebagai upaya untuk mendukung industrialisasi perkebunan yang berkelanjutan. Platform ini menghimpun, mengintegrasikan, dan memvisualisasikan informasi perizinan perkebunan, industri pengolahan, perkebunan rakyat, dan produksi.</p>
        </div>

        <div class="max-w-3xl mx-auto px-4 py-4 border border-siska" x-data="{nav:'tujuan'}">
            <div class="flex whitespace-nowrap justify-center max-w-3xl mx-auto   ">

                <div :class="(nav === 'tujuan') ? 'bgtentangsiskagelap flex justify-center sm:w-3/12 w-full h-full  py-4 px-1 cursor-pointer ' : ' cursor-pointer bgtentangsiskamuda flex justify-center sm:w-3/12 w-full h-full  py-4 px-1 ' " @click="nav='tujuan'">
                    <a class="text-white sm:text-sm text-xs">TUJUAN</a>
                </div>
                <div :class="(nav === 'produkpengguna') ? 'bgtentangsiskagelap flex justify-center sm:w-3/12 w-full h-full  py-4 px-1 cursor-pointer ' : ' cursor-pointer bgtentangsiskamuda flex justify-center sm:w-3/12 w-full h-full  py-4 px-1 ' " @click="nav='produkpengguna'">
                    <a class="text-white sm:text-sm text-xs ">PRODUK & PENGGUNA</a>
                </div>
                <div :class="(nav === 'manfaat') ? 'bgtentangsiskagelap flex justify-center sm:w-3/12 w-full h-full  py-4 px-1 cursor-pointer ' : ' cursor-pointer bgtentangsiskamuda flex justify-center sm:w-3/12 w-full h-full  py-4 px-1 ' " @click="nav='manfaat'">
                    <a class="text-white sm:text-sm text-xs">MANFAAT</a>
                </div>
            </div>
            <div class="flex flex-col  max-w-3xl mx-auto text-sm mt-4">
                <div x-show="nav==='tujuan'" style="display: none !important;">
                    <p class="leading-relaxed mb-2"> <a class="font-bold">Tujuan</a> mendukung penerapan decision support system untuk perencanaan, pengawasan dan pengendalian usaha perkebunan  di Kalimantan Tengah yang terukur, berkeadilan dan berkelanjutan.</p>
                    <div class="w-full flex sm:flex-row flex-col mb-6">
                        <div class="border border-black  px-4 py-2 sm:w-4/12 w-full">
                            <a class="font-bold mb-1">Terukur:</a>
                            <p>Perencanaan, pengendalian dan pengawasan perkebunan akan lebih terukur dengan basis data yang kredibel dan terintegrasi sehingga menjamin stabilitas industrialisasi perkebunan </p>
                        </div>
                        <div class="sm:border-t sm:border-b sm:border-l-0 sm:border-r-0 border-l border-r border-black px-4 py-2 sm:w-4/12 w-full">
                            <a class="font-bold mb-1">Berkeadilan:</a>
                            <p>Perkembangan usaha perkebunan  tidak hanya fokus pada perkebunan skala besar namun juga berdampak langsung pada perkebunan rakyat serta berkontribusi pada pendapatan daerah</p>
                        </div>
                        <div class="border border-black px-4 py-2 sm:w-4/12 w-full">
                            <a class="font-bold mb-1">Berkelanjutan:</a>
                            <p>Pengembangan perkebunan  selaras dengan daya dukung dan daya tampung lingkungan sebagai bentuk komitmen pembangunan berkelanjutan </p>
                        </div>
                    </div>
                </div>
                <div x-show="nav==='produkpengguna'" style="display: none !important;">
                    <p class="leading-relaxed mb-4"> <a class="font-bold">Produk</a> dalam platform ini meliputi basis data perizinan, pabrik, dan perkebunan  rakyat yang disajikan dalam dashboard data dan peta yang memungkinkan pengguna mengakses dan mengeksplor perkembangan perkebunan  berdasarkan kabupaten, subyek perizinan, status lahan dsb.</p>

                    <p class="leading-relaxed mb-6"><a class="font-bold"> Pengguna </a> adalah internal Dinas Perkebunan Provinsi Kalimantan Tengah, Instansi Pemerintah lainnya, dan Publik.</p>
                </div>
                <div x-show="nav==='manfaat'" style="display: none !important;">
                    <p class="mb-4"><a class="font-bold">Pemerintah Daerah</a>: Memudahkan Pemerintah Provinsi dan Kabupaten/Kota menghimpun dan menyajikan data secara cepat untuk mendukung perencanaan, pengawasan dan pengendalian perizinan, termasuk penilaian usaha perkebunan.</p>
                    <p class="mb-4"><a class="font-bold">Pemerintah Pusat</a>: Memudahkan Pemerintah Pusat mengintegrasikan data untuk pengawasan kepatuhan perizinan, kewajiban keuangan dan lingkungan, serta kinerja perkebunan.</p>
                    <p class="mb-4"><a class="font-bold">Pelaku Usaha</a>: Memungkinkan Pelaku Usaha untuk mengidentifikasi potensi pasokan bahan baku dan pengawasan rantai pasok dari perkebunan rakyat.
                            </p>
                </div>


            </div>
        </div>

        @include('partials.footer')
    </section>
@endsection


