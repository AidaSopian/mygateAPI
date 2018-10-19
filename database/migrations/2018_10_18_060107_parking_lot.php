<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParkingLot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_lot', function (Blueprint $table) {
            $table->increments('p_id',10);
            $table->integer('s_id');
            $table->integer('user_id');
<<<<<<< HEAD
            $table->string('unit_id');
=======
            $table->string('unit_id',10);
>>>>>>> 4b4e848a18b332aff8fee23d2bb69e224484fb11
            $table->string('parking_slot',20);
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
