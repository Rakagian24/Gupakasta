<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNPDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npds', function (Blueprint $table) {
            $table->id();
            $table->string('PPTK', 255);
            $table->string('kode_program', 10);
            $table->string('kode_kegiatan', 10);
            $table->string('kode_sub_kegiatan', 10);
            $table->year('Tahun');
            $table->string('Nomer');

            $table->foreign('kode_program')->references('kode_program')->on('program')->onDelete('cascade');
            $table->foreign('kode_kegiatan')->references('kode_kegiatan')->on('kegiatan')->onDelete('cascade');
            $table->foreign('kode_sub_kegiatan')->references('kode_sub_kegiatan')->on('sub_kegiatan')->onDelete('cascade');

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
        Schema::dropIfExists('npds');
    }
}
