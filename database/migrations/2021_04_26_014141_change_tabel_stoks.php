<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTabelStoks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_stoks', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('kategori')->after('nama');
            $table->dropColumn('id_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabel_stoks', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('kategori')->after('nama');
        });
    }
}
