<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parkingLot extends Model
{
    public $table = "parking_lot";
    public $timestamps = false;

    public $primaryKey = "p_id";

    protected $fillable =
    ['s_id', 'user_id', 'unit_id', 'parking_slot','status'];
}
