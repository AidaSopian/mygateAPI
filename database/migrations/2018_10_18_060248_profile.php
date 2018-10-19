<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('id');
=======
            $table->increments('id', 10);
>>>>>>> 4b4e848a18b332aff8fee23d2bb69e224484fb11
            $table->integer('user_id');
            $table->string('name');
            $table->integer('phone');
            $table->longText('address');
            $table->string('zip');
            $table->string('city');
            $table->string('state');
            $table->string('country');
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
