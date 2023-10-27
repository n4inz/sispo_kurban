<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumStatusPaidOnTableUserPaketKurbans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_paket_kurbans', function (Blueprint $table) {
            $table->integer('status_paid')->default(0);
            $table->integer('jumlah_bayar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_paket_kurbans', function (Blueprint $table) {
            //
        });
    }
}
