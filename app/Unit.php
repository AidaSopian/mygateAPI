<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $primaryKey = 'unit_id';

    protected $fillable = [
     'block_no', 'unit_no', 'status', 'floor_no'
    ];

    protected $searchable = [
        'block_no', 'unit_no', 'status', 'floor_no'
    ];

    public $timestamps = false;
}
