<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Society extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society', function (Blueprint $table) {
            $table->increments('s_id',10);
            $table->string('name');
            $table->integer('ic_no');
            $table->integer('no_phone');
            $table->longText('address');
            $table->string('plate_no',20);
<<<<<<< HEAD
            $table->string('type_vehicles');
=======
            $table->string('type_vehicles',255);
>>>>>>> 4b4e848a18b332aff8fee23d2bb69e224484fb11
            $table->tinyInteger('status');
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
