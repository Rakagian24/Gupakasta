<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranSubKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_sub_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggaran_kegiatan');
            $table->unsignedBigInteger('kode_sub_kegiatan');
            $table->timestamps();
            $table->foreign('id_anggaran_kegiatan')->references('id')->on('anggaran_kegiatans');
            $table->foreign('kode_sub_kegiatan')->references('id')->on('sub_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran_sub_kegiatans');
    }
}
