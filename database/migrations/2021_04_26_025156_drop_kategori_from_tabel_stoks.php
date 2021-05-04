<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropKategoriFromTabelStoks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_stoks', function (Blueprint $table) {
            $table->dropColumn('kategori');
            $table->string('nama')->unique()->change();
            $table->string('satuan')->default('kg')->change();
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
            //
        });
    }
}
