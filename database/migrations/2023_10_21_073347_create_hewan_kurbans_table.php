<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHewanKurbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hewan_kurbans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_hewan');
            $table->string('jenis');
            $table->integer('harga');
            $table->integer('jumlah_peserta');
            $table->text('ket')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hewan_kurbans');
    }
}
