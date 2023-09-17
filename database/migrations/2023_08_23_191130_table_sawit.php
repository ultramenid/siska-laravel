<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbsawit', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->float('tbm', 16, 2);
            $table->float('tm', 16, 2);
            $table->float('tr', 16, 2);
            $table->float('totalluas', 16, 2);
            $table->float('produksi', 16, 2);
            $table->float('produktifitas', 16, 2);
            $table->string('petani');
            $table->string('produk');
            $table->string('pengusahaan');
            $table->string('komoditas');
            $table->string('provinsi');
            $table->string('sumberdata');
            $table->string('tahundata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbsawit');

    }
};
