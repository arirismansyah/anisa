<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkpaSatkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikpa_satkers', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->integer('bulan');
            $table->float('nilai_revisi_dipa')->default(0);
            $table->float('nilai_deviasi_tiga_dipa')->default(0);
            $table->float('nilai_penyerapan_anggaran')->default(0);
            $table->float('nilai_belanja_kontraktual')->default(0);
            $table->float('nilai_penyelesaian_tagihan')->default(0);
            $table->float('nilai_up_tup')->default(0);
            $table->float('nilai_dispensasi_spm')->default(0);
            $table->float('nilai_capaian_output')->default(0);
            $table->float('ikpa')->default(0);
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
        Schema::dropIfExists('ikpa_satkers');
    }
}
