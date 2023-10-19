<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditCapaianOutputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('capaian_outputs', function (Blueprint $table) {
            $table->dropColumn('persen_pcro');
            $table->float('nilai_kepatuhan')->default(0);
            $table->float('nilai_capaian')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
