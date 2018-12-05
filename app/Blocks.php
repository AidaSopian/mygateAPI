<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Blocks extends Model
{
    use HasApiTokens;
  //  public $table= "blocks";
    protected $primaryKey= 'block_id';

    protected $fillable= [
        'block_type', 'status'
    ];

    public $timestamps= false;


}
