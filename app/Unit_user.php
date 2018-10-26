<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit_user extends Model
{
    public $table= "unit_user";

    public $timestamps = false;

   public $primaryKey = "unit_user_id";

    protected $fillable = ['unit_user_id','user_id','s_id', 'permission_id', 'unit_id', 'time_in', 'time_out','status'];
}
