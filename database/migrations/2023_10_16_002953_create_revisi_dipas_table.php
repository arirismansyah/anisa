<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisiDipasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_dipa', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran')->unique();
            $table->integer('rev_jan')->default(0);
            $table->integer('rev_feb')->default(0);
            $table->integer('rev_mar')->default(0);
            $table->integer('rev_apr')->default(0);
            $table->integer('rev_may')->default(0);
            $table->integer('rev_jun')->default(0);
            $table->integer('rev_jul')->default(0);
            $table->integer('rev_aug')->default(0);
            $table->integer('rev_sep')->default(0);
            $table->integer('rev_oct')->default(0);
            $table->integer('rev_nov')->default(0);
            $table->integer('rev_dec')->default(0);
            $table->integer('rev_tw_1')->default(0);
            $table->integer('rev_tw_2')->default(0);
            $table->integer('rev_tw_3')->default(0);
            $table->integer('rev_tw_4')->default(0);
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
        Schema::dropIfExists('revisi_dipa');
    }
}
