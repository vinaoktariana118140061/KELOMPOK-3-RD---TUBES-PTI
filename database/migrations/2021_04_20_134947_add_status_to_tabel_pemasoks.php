<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTabelPemasoks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_pemasoks', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabel_pemasoks', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('kategori');
        });
    }
}
