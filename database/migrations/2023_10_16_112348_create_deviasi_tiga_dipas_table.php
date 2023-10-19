<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviasiTigaDipasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deviasi_tiga_dipas', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->integer('bulan');
            $table->bigInteger('rencana_anggaran');
            $table->bigInteger('penyerapan_anggaran');
            $table->float('persen_deviasi');
            $table->float('persen_deviasi_sebelumnya');
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
        Schema::dropIfExists('deviasi_tiga_dipas');
    }
}
