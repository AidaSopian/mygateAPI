<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class society extends Model
{
    //model society
    public $table = "society";
    
    public $timestamps = false;
    
    public $primaryKey = "s_id";

    protected $fillable = ['s_id','name', 'ic_no', 'no_phone', 'address', 'plate_no', 'type_vehicles', 'status'];
}
