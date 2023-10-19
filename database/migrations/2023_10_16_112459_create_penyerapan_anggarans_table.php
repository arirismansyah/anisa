<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyerapanAnggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyerapan_anggarans', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->integer('bulan');
            $table->bigInteger('pagu');
            $table->bigInteger('blokir');
            $table->bigInteger('pagu_netto');
            $table->bigInteger('nominal_target');
            $table->bigInteger('nominal_penyerapan');
            $table->bigInteger('persentase_penyerapan');
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
        Schema::dropIfExists('penyerapan_anggarans');
    }
}
