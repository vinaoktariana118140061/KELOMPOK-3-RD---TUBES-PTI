<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTabelPengeluarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_pengeluarans', function (Blueprint $table) {
            $table->date('tanggal')->change();
            $table->string('kategori')->after('id_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabel_pengeluarans', function (Blueprint $table) {
            $table->string('kategori')->after('id_barang');
        });
    }
}
