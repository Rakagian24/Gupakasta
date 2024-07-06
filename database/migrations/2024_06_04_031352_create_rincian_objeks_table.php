<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianObjeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincian_objeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_akun');
            $table->foreignId('kode_kelompok');
            $table->foreignId('kode_jenis');
            $table->foreignId('kode_objek');
            $table->bigInteger('kode_rincian_objek');
            $table->string('nama_rincian_objek');
            $table->string('deskripsi');
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
        Schema::dropIfExists('rincian_objeks');
    }
}
