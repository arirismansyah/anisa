<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBelanjaKontraktualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belanja_kontraktual', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->date('tgl_kontrak');
            $table->date('tgl_daftar');
            $table->integer('nilai_kepatuhan')->default(0);
            $table->integer('nilai_pra')->default(0);
            $table->integer('nilai_akselerasi')->default(0);
            $table->float('ikpa')->default(0);
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
        Schema::dropIfExists('belanja_kontraktual');
    }
}
