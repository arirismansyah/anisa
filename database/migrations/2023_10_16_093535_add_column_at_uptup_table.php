<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAtUptupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('up_tups', function (Blueprint $table) {
            $table->float('persentase_gup')->default(0);
            $table->date('tgl_gup');
            $table->date('tgl_gup_sebelumnya');
            $table->float('persentase_tup')->default(0);
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
