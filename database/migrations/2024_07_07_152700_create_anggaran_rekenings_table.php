<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_rekenings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggaran_sub_kegiatan');
            $table->unsignedBigInteger('kode_sub_rincian_objek');
            $table->decimal('budget', 15, 2);
            $table->decimal('spj_lalu', 15, 2)->nullable();
            $table->decimal('ls', 15, 2)->nullable();
            $table->decimal('gu', 15, 2)->nullable();
            $table->decimal('spj_ini', 15, 2)->nullable();
            $table->decimal('remaining_budget', 15, 2);
            $table->timestamps();
            $table->foreign('id_anggaran_sub_kegiatan')->references('id')->on('anggaran_sub_kegiatans');
            $table->foreign('kode_sub_rincian_objek')->references('id')->on('sub_rincian_objek');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggaran_rekenings');
    }
}
