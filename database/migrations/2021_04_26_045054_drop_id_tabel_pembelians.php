<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropIdTabelPembelians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_pembelians', function (Blueprint $table) {
            $table->dropColumn('id_barang');
            $table->string('nama')->after('id');
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
            $table->string('nama')->after('id');
        });
    }
}
