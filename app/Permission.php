<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
<<<<<<< HEAD
    public $table = "permission";
=======
    //
>>>>>>> 3f827da712ca022103068000d97799ee0ae39697
    public $timestamps = false;
    
    public $primaryKey = "permission_id";

    protected $fillable = ['staff_id', 'details','created_at', 'updated_at'];
}
