<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SocietyUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('society_user', function (Blueprint $table) {
            $table->increments('society_user_id');
            $table->integer('user_id');
            $table->integer('s_id');
            $table->integer('permission_id');
            $table->integer('unit_id');
            $table->dateTime('time_in')->nullable();
            $table->dateTime('time_out')->nullable();
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
