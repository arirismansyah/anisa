<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpTupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('up_tups', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->integer('bulan');
            $table->integer('jml_gup_tepat_waktu')->default(0);
            $table->integer('jml_ptup_tepat_waktu')->default(0);
            $table->integer('jml_gup')->default(0);
            $table->integer('jml_ptup')->default(0);
            $table->integer('pinalti_nilai')->default(0);
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
        Schema::dropIfExists('up_tups');
    }
}
