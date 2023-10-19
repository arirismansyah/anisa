<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispensasiSpmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispensasi_spm', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->integer('jumlah_spm_dispensasi')->default(0);
            $table->integer('jumlah_spm')->default(0);
            $table->float('nilai_permil')->default(0);
            $table->float('ikpa')->default(100);
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
        Schema::dropIfExists('dispensasi_spm');
    }
}
