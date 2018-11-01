<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $table = "staff_management";
    public $timestamps = false;
    
    public $primaryKey = "staff_id";
    protected $fillable = ['unit_user_id','status'];
}
