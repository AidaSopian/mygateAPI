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
            $table->increments('s_id');
            $table->increments('permission_id');
            $table->increments('user_id');
            $table->increments('unit_id');
            $table->string('date');
            $table->timestamp('time_in')->nullable();
            $table->timestamp('time_out')->nullable();
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
