<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedAtToTabelStoks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabel_stoks', function (Blueprint $table) {
            $table->timestamp('updated_at')->after('satuan');
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
            $table->timestamp('updated_at')->after('satuan');
        });
    }
}
