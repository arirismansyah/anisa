<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaianOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaian_outputs', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->integer('bulan');
            $table->string('kd_program');
            $table->string('kd_kegiatan');
            $table->string('kd_output');
            $table->string('kd_suboutput');
            $table->string('uraian_output');

            $table->date('tanggal_entri');
            $table->float('target_pcro');
            $table->float('penambahan_pcro');
            $table->float('target_rvro');
            $table->float('penambahan_rvro');
            $table->float('persen_pcro');
            $table->float('ikpa');
            $table->string('username');
            $table->string('kode_tim');
            $table->string('nama_tim');
            $table->integer('warning')->default(0);
            $table->text('warning_desc')->nullable();
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capaian_outputs');
    }
}
