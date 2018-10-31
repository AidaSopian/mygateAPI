<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $table = "units";
    public $timestamps = false;
    
    public $primaryKey = "unit_id";

    protected $fillable = ['block_id', 'unit_no','status', 'floor_no'];
}
