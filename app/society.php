<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use scopeSearch;

class society extends Model
{
    
    

    public $table= "society";

    public $timestamps = false;

   public $primaryKey = "s_id";

    protected $fillable = ['s_id','name','ic_no', 'no_phone', 'address', 'plate_no', 'type_vehicles','status'];


    protected $searchable = [
        'name'
    ];
}

