<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pembelians', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('nama');
            $table->integer('id_pemasok');
            $table->string('nota');
            $table->integer('jumlah');
            $table->string('payment');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_pembelians');
    }
}
