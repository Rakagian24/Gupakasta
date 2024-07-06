<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku__kas', function (Blueprint $table) {
            $table->id();
            $table->string('uraian');
            $table->string('kegiatan');
            $table->string('sub_kegiatan');
            $table->string('kode_rekening');
            $table->string('penerimaan');
            $table->string('pengeluaran');
            $table->string('saldo');
            $table->string('dpp');
            $table->string('penyedia');
            $table->string('id_biling');
            $table->string('ntpn');
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
        Schema::dropIfExists('buku__kas');
    }
}
