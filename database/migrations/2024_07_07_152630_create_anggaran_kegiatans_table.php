<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kegiatan', 10);
            $table->timestamps();
            $table->foreign('kode_kegiatan')->references('kode_kegiatan')->on('kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran_kegiatans');
    }
}
