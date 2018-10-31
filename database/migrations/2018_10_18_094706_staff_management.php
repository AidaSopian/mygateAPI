<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffManagement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_management', function (Blueprint $table) {
            $table->increments('staff_id',10);
            $table->integer('unit_user_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password',60);
            $table->tinyInteger('status');
            //
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
