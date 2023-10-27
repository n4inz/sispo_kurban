<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnHargaPerOrangOnTableHewanKurbans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hewan_kurbans', function (Blueprint $table) {
            $table->integer('harga_per_orang')->after('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hewan_kurbans', function (Blueprint $table) {
            //
        });
    }
}
