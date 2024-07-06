<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRincianObjeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_rincian_objeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kode_akun');
            $table->foreignId('kode_kelompok');
            $table->foreignId('kode_jenis');
            $table->foreignId('kode_objek');
            $table->foreignId('kode_rincian_objek');
            $table->bigInteger('kode_sub_rincian_objek');
            $table->string('nama_sub_rincian_objek');
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
        Schema::dropIfExists('sub_rincian_objeks');
    }
}
