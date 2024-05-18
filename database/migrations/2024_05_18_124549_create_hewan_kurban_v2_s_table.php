<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHewanKurbanV2STable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hewan_kurban_v2_s', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->string('nama_hewan');
            $table->string('jenis');
            $table->integer('harga');
            $table->integer('jumlah_hewan');
            $table->string('nama_keluarga');
            $table->string('alamat');
            $table->text('ket');
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
        Schema::dropIfExists('hewan_kurban_v2_s');
    }
}
