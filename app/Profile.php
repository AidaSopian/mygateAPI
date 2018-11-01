<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $table = "profile";
    public $timestamps = false;
    
    public $primaryKey = "id";
    protected $fillable = ['user_id','name','phone','address','zip','city','state','country'];
}
