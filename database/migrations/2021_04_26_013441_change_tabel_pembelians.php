<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTabelPembelians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_pembelians', function (Blueprint $table) {
            $table->dropColumn('nama');
            $table->bigInteger('id_barang')->after('date');
            $table->string('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabel_pembelians', function (Blueprint $table) {
            $table->bigInteger('id_barang')->after('date');
        });
    }
}
