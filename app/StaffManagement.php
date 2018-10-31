<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffManagement extends Model
{
    //push this
    protected $table = "staff_management";

    public $timestamps = false;
    
    public $primaryKey = "staff_id";

    protected $fillable = ['unit_user_id','name', 'email','password','status'];
    //
}
