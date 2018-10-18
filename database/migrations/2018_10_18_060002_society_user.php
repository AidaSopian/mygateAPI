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
            $table->integer('society_user_id',10)->autoIncrement();
            $table->integer('user_id',10)->autoIncrement();
            $table->integer('s_id',10)->autoIncrement();
            $table->integer('permission_id',10)->autoIncrement();
            $table->integer('unit_id', 10)->autoIncrement();
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
