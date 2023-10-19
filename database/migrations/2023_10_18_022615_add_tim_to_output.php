<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimToOutput extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_outputs', function (Blueprint $table) {
            //
            $table->string('kode_tim')->nullable()->change();
            $table->string('nama_tim')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_outputs', function (Blueprint $table) {
            //
        });
    }
}
