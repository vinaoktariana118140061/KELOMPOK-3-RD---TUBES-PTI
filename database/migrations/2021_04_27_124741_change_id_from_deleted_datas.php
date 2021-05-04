<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdFromDeletedDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deleted_datas', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->before('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deleted_datas', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->before('date');
        });
    }
}
