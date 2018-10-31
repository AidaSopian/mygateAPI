<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entryPass extends Model
{
    public $table = "entry";

    public $timestamps = false;

    public $primaryKey = "entryPass_id";

    protected $fillable =[ 'entryPass_id', 'unit_user_id', 'unit_id','status'];

}
