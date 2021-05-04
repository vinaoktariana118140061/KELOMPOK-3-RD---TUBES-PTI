<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeJumlahAtTabelStoks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_stoks', function (Blueprint $table) {
            $table->float('stok')->change();
            $table->dropColumn('id_pemasok');
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
