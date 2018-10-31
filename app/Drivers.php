<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drivers extends Model
{
   use SoftDeletes;

  //
   protected $table = 'society';
   protected $fillable = [
                           's_id',
                          ];

   
}