<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class society extends Model
{
    
    use scopeSearch;
    use SoftDeletes;

    public $table= "society";

    public $timestamps = false;

   public $primaryKey = "s_id";

    protected $fillable = ['s_id','name','ic_no', 'no_phone', 'address', 'plate_no', 'type_vehicles','status'];

}

