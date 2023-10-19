<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_outputs', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->string('kd_program');
            $table->string('kd_kegiatan');
            $table->string('kd_output');
            $table->string('kd_suboutput');
            $table->string('uraian_output');
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
        Schema::dropIfExists('m_outputs');
    }
}
