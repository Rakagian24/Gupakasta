<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanDinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan_dinas', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('jenis');
            $table->string('merk');
            $table->string('silinder');
            $table->bigInteger('tahun');
            $table->string('no_polisi');
            $table->bigInteger('usia');
            $table->string('pemegang');
            $table->boolean('jabatan');
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
        Schema::dropIfExists('kendaraan_dinas');
    }
}
