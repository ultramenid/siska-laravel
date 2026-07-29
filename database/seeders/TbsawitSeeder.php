<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeds tbsawit with the real plantation metrics (Perkebunan Besar Swasta +
 * Perkebunan Rakyat, 2010–2021) sourced from the local dev database.
 */
class TbsawitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbsawit')->truncate();

        $now = now();
        $common = [
            'komoditas' => 'Sawit',
            'provinsi' => 'Kalimantan Tengah',
            'sumberdata' => 'Dinas Perkebunan Provinsi',
            'tahundata' => '2021',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $rows = [
            // Perkebunan Besar Swasta
            ['2010', 566203.54, 560155.87, 0, 1126359.41, 1935820.51, 3.46, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2011', 364141.18, 700624.64, 171, 1064936.82, 5654725.96, 8.07, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2012', 271490.95, 713074.32, 171, 984736.27, 5371950.04, 7.53, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2013', 282966.90, 769089.32, 2479.24, 1054535.46, 2852677.60, 3.71, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2014', 352676.53, 803700.62, 600.22, 1156977.37, 3309817.88, 4.12, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2015', 270411.22, 994328.96, 1.72, 1264741.90, 4239831.94, 4.26, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2016', 319970.46, 1127691.99, 1.72, 1447664.17, 4301154.85, 3.81, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2017', 219162.91, 1132213.89, 1.72, 1351378.52, 5236931.86, 4.63, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2018', 215136.64, 1138872.38, 1.72, 1354010.74, 4880823.19, 4.29, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2019', 246127.21, 1152485.20, 1.72, 1398614.13, 4869670.97, 4.23, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            ['2020', 204714.24, 1238215.80, 1.72, 1442931.76, 5080440.38, 4.10, '0.00', '', 'Perkebunan Besar Swasta'],
            ['2021', 181489.88, 1331892.31, 804.47, 1514186.66, 5554002.84, 4.17, '0.00', 'Crude Palm Oil', 'Perkebunan Besar Swasta'],
            // Perkebunan Rakyat
            ['2010', 70607.29, 73916.51, 94.82, 144618.62, 218327.18, 2.95, '65846.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2011', 43057.53, 85352.46, 136.71, 128546.70, 380573.31, 4.46, '55206.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2012', 96416.80, 78761.22, 4095.12, 179273.14, 335770.61, 4.26, '56471.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2013', 47941.71, 78887.03, 4228.31, 131057.05, 348242.55, 4.41, '57970.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2014', 57137.83, 79604.73, 4166.24, 140908.80, 139214.20, 1.75, '60899.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2015', 61065.86, 80406.91, 4803.74, 146276.51, 231469.54, 2.88, '62529.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2016', 61888.71, 83313.47, 4728.24, 149930.42, 240067.69, 2.88, '65090.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2017', 65324.44, 87676.79, 3835.80, 156837.03, 256316.92, 2.92, '69492.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2018', 64382.34, 98330.77, 4212.98, 166926.09, 277700.52, 2.82, '72310.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2019', 64407.57, 105097.98, 4814.63, 174320.18, 294149.35, 2.80, '74445.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2020', 90795.76, 258947.25, 8200.63, 357943.64, 934919.58, 3.61, '130806.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
            ['2021', 94718.23, 268984.39, 6714.30, 370416.92, 982721.41, 3.65, '133122.00', 'Crude Palm Oil', 'Perkebunan Rakyat'],
        ];

        DB::table('tbsawit')->insert(
            array_map(
                fn ($r) => array_combine(
                    ['tahun', 'tbm', 'tm', 'tr', 'totalluas', 'produksi', 'produktifitas', 'petani', 'produk', 'pengusahaan'],
                    $r
                ) + $common,
                $rows
            )
        );
    }
}
