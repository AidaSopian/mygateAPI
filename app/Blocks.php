<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocks extends Model
{
  //  public $table= "blocks";
    protected $primaryKey= 'block_id';

    protected $fillable= [
        'block_id','block_type', 'status'
    ];

    public $timestamps= false;


}
