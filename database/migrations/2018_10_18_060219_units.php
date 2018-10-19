<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Units extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
        Schema::create('unit', function (Blueprint $table) {
            $table->increments('unit_id',10);
            $table->integer('block_id');
            $table->string('unit_no');
=======
        Schema::create('units', function (Blueprint $table) {
            $table->increments('unit_id',10);
            $table->integer('block_id');
            $table->string('unit_no',10);
>>>>>>> 4b4e848a18b332aff8fee23d2bb69e224484fb11
            $table->tinyInteger('status');
            $table->string('floor_no',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
