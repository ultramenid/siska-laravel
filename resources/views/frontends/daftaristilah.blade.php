@extends('layouts.indexLayout')

@section('content')
    <section class="w-full relative" >
        @include('partials.navMobile')
        @include('partials.nav')

        <div class="max-w-3xl mx-auto px-4 sm:py-32  py-4">
            <div class="bg-white  rounded-md w-full">
                <div class=" flex items-center justify-between pb-6">
                    <div>
                        <h2 class="text-gray-600 font-semibold text-xl">Daftar Istilah</h2>
                    </div>
                </div>
                    <div>
                        <div class=" overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Istilah
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Deskripsi
                                            </th>
                                            <th
                                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Sumber
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Grup Perusahaan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Dua atau lebih badan usaha yang sebagian modal dan/atau sahamnya dimiliki oleh perorangan atau oleh badan hukum yang sama baik secara langsung maupun melalui badan hukum lain, dengan jumlah atau sifat pemilikan sedemikian rupa, sehingga melalui pemilikan modal dan/atau saham tersebut dapat secara langsung atau tidak langsung menentukan penyelenggaraan atau jalannya kegiatan berusaha.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Permen ATR/BPN 17/2019
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Hak Atas Tanah
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Hak yang diperoleh dari hubungan hukum antara pemegang hak dengan Tanah, termasuk ruang di atas Tanah, dan atau ruang di bawah Tanah untuk menguasai, memiliki, menggunakan, dan memanfaatkan, serta memelihara Tanah, ruang di atas Tanah, dan/atau ruang di bawah Tanah</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 5/1990
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Hak Guna Usaha
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Hak Guna Usaha adalah hak untuk mengusahakan tanah yang dikuasai langsung oleh negara untuk usaha pertanian, perikanan atau peternakan</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 5/1990
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Industri pengolahan hasil perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Kegiatan penanganan dan pemrosesan yang dilakukan terhadap hasil tanaman perkebunan yang ditujukan untuk mencapai nilai tambah yang lebih tinggi. </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Izin Lokasi
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Izin Lokasi adalah izin yang diberikan kepada pelaku usaha untuk memperoleh tanah yang diperlukan untuk usaha dan/atau kegiatannya dan berlaku pula sebagai izin pemindahan hak dan untuk menggunakan tanah tersebut untuk keperluan usaha dan/atau kegiatannya </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Permen ATR/BPN 17/2019
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Izin Usaha Perkebunan (IUP)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Izin tertulis dari Pejabat yang berwenang dan wajib dimiliki oleh perusahaan perkebunan yang melakukan usaha budidaya perkebunan dan terintegrasi dengan usaha industri pengolahan hasil perkebunan </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Izin Usaha Perkebunan untuk Budidaya (IUP-B)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Izin tertulis dari Pejabat yang berwenang dan wajib dimiliki oleh perusahaan perkebunan yang melakukan usaha budidaya perkebunan.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Izin Usaha Perkebunan untuk Pengolahan (IUP-P)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Izin tertulis dari Pejabat yang berwenang dan wajib dimiliki oleh perusahaan perkebunan yang melakukan usaha industri pengolahan hasil perkebunan.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Kebun Inti
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Kebun yang dibangun oleh perusahaan perkebunan dengan kelengkapan fasilitas pengolahan dan dimiliki oleh perusahaan perkebunan tersebut dan dipersiapkan menjadi pelaksana Perkebunan Inti Rakyat.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Kebun Plasma
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Kebun yang dibangun dan dikembangkan oleh perusahaan perkebunan (Kebun Inti), serta ditanami dengan tanaman perkebunan. Kebun plasma ini semenjak penanamannya dipelihara dan dikelola kebun inti hingga berproduksi. Setelah tanaman mulai berproduksi, penguasaan dan pengelolaannya diserahkan kepada petani rakyat (dikonversikan). Petani menjual hasil kebunnya kepada kebun inti dengan harga pasar dikurangi cicilan/angsuran pembayaran hutang kepada kebun inti berupa modal yang dikeluarkan kebun inti membangun kebun plasma tersebut.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Kelompok (group) Perusahaan Perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Kumpulan orang atau badan usaha perkebunan yang satu sama lain mempunyai kaitan dalam hal kepemilikan, kepengurusan, dan/atau hubungan keuangan.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Pabrik Kelapa Sawit
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Pabrik kelapa sawit (PKS) merupakan pabrik yang mengolah TBS sebagai bahan baku menjadi CPO (crude palm oil) dan inti sawit dengan menggunakan berbagai tahapan-tahapan proses pengolahan dari mulai stasiun penerimaan bahan baku, perebusan, pemipilan, pengempaan, pemurnian minyak.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Pekebun
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Perorangan warga negara Indonesia yang melakukan usaha perkebunan dengan skala usaha tidak mencapai skala tertentu</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Pelaku Usaha Perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Pekebun dan perusahaan perkebunan yang mengelola usaha perkebunan.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Pelepasan Kawasan Hutan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Persetujuan tentang perubahan peruntukan Kawasan Hutan Produksi yang dapat dikonversi dan/atau Hutan Produksi Tetap menjadi bukan Kawasan Hutan yang diterbitkan oleh Menteri.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    PermenLHK 8/2021
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perizinan Berusaha
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Legalitas yang diberikan kepada Pelaku Usaha untuk memulai dan menjalankan usaha dan/atau kegiatannya</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    PP 5/2021
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Segala kegiatan yang mengusahakan tanaman tertentu  pada tanah dan/atau media tumbuh lainnya dalam ekosistem yang sesuai, mengolah dan memasarkan barang dan jasa hasil tanaman tersebut, dengan bantuan ilmu pengetahuan dan teknologi, permodalan serta
                                                    manajemen untuk mewujudkan kesejahteraan bagi pelaku usaha perkebunan dan masyarakat.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perkebunan Rakyat
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Usaha tanaman perkebunan yang dimiliki dan atau diselenggarakan atau dikelola oleh perorangan/tidak berbadan hukum, dengan luasan maksimal 25 hektar.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perkebunan Rakyat
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Perkebunan Rakyat (PR) (tidak berbadan hukum) adalah perkebunan yang diselenggarakan atau dikelola oleh rakyat/pekebun yang dikelompokkan dalam usaha kecil tanaman perkebunan rakyat dan usaha rumahtangga perkebunan rakyat</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Statistik Kelapa Sawit Indonesia 2020, BPS 
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perusahaan Inti Rakyat – Kredit Koperasi Primer untuk Anggota (PIR-KKPA)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Pola PIR yang mendapat fasilitas kredit kepada koperasi primer untuk anggota. </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perusahaan Inti Rakyat – Perkebunan (PIR-BUN)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Pola pelaksanaan pembangunan perkebunan dengan menggunakan perkebunan besar sebagai inti yang membantu dan membimbing perkebunan rakyat di sekitarnya berupa plasma dalam suatu sistem kerjasama yang saling menguntungkan, utuh dan berkesinambungan.  </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perusahaan Inti Rakyat – Transmigrasi (PIR-TRANS)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Pola pelaksanaan pembangunan perkebunan dengan menggunakan perkebunan besar sebagai inti yang membantu dan membimbing perkebunan rakyat di sekitarnya sebagai plasma dalam suatu sistem kerjasama yang saling menguntungkan, utuh dan berkesinambungan yang dikaitkan dengan program transmigrasi. </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Perusahaan Perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Badan hukum yang didirikan menurut hukum Indonesia dan berkedudukan di Indonesia yang mengelola usaha perkebunan dengan skala tertentu.</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Produksi kelapa sawit
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">Produksi kelapa sawit yang disajikan pada publikasi ini berupa produksi olahan yaitu produksi primer yang telah diolah menjadi suatu bentuk barang jadi atau barang setengah jadi, sehingga nilai ekonomisnya lebih tinggi, dalam hal ini minyak kelapa sawit Crude Palm Oil (CPO).</p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Statistik Kelapa Sawit Indonesia 2020, BPS 
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Sawit Rakyat
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed"></p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Skala Tertentu
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Usaha perkebunan yang didasarkanpada luasan lahan usaha, jenis tanaman, teknologi, tenaga kerja, modal, dan/atau kapasitas pabrik yang diwajibkan memiliki izin usaha.
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Surat Tanda Daftar Usaha Perkebunan untuk Budidaya (STD-B)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Keterangan budidaya yang diberikan kepada pekebun.
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Surat Tanda Daftar Usaha Perkebunan untuk Industri Pengolahan Hasil Perkebunan (STD-P)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Keterangan industri yang diberikan kepada pekebun.
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Tanaman Belum Menghasilkan (TBM)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Tanaman yang sampai pada saat pengamatan belum pernah memberikan hasil, karena masih muda atau tanaman sudah cukup umur tetapi belum dapat menghasilkan karena tidak cocok dengan iklim, ketinggian tempat, kondisi tanah dan sebagainya.
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Statistik Kelapa Sawit Indonesia 2020, BPS 
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Tanaman Menghasilkan (TM)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Tanaman yang sebelum saat pengamatan pernah memberikan hasil dan masih akan memberikan hasil, meskipun pada saat pengamatan sedang tidak menghasilkan.
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Statistik Kelapa Sawit Indonesia 2020, BPS 
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Tanaman Tidak Menghasilkan/Tua/Rusak (TTM)
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Tanaman yang sudah tua, rusak, dan tidak memberikan hasil yang memadai lagi, walaupun ada hasilnya tetapi secara ekonomi sudah tidak produktif lagi (produksi kurang dari 15 persen dari produksi normal).
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Statistik Kelapa Sawit Indonesia 2020, BPS 
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Usaha Budidaya Tanaman Perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Serangkaian kegiatan pengusahaan tanaman perkebunan yang meliputi kegiatan pra-tanam, penanaman, pemeliharaan tanaman, pemanenan dan sortasi termasuk perubahan jenis tanaman, dan diversifikasi tanaman.
                                                    
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Usaha Industri Pengolahan Hasil Perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Serangkaian kegiatan penanganan dan pemrosesan yang dilakukan terhadap hasil tanaman perkebunan yang ditujukan untuk mencapai nilai tambah yang lebih tinggi dan memperpanjang daya simpan.
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                Usaha Perkebunan
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="leading-relaxed">
                                                    Usaha yang menghasilkan barang dan/atau jasa perkebunan
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    UU 39/2014, Permentan 98/2013
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @include('partials.footer')
    </section>
@endsection


 