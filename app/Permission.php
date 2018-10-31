<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //push this file
    public $timestamps = false;
    
    public $primaryKey = "permission_id";

    protected $fillable = ['staff_id', 'details','created_at', 'updated_at'];
}
