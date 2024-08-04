<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumKecamatanOnTableHewanKurbanV2S extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hewan_kurban_v2_s', function (Blueprint $table) {
            $table->string('kecamatan')->after('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hewan_kurban_v2_s', function (Blueprint $table) {
            //
        });
    }
}
