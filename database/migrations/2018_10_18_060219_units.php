<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Units extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('unit_id',10);
            $table->integer('block_id');
            $table->string('unit_no',10);
            $table->tinyInteger('status');
            $table->string('floor_no',10);
        });

        DB::statement('ALTER TABLE users ADD FULLTEXT fulltext_index (unit_id, block_id, unit_no,status_s,floor_no)');
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
