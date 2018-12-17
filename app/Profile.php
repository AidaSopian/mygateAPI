<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Profile extends Model
{
    use AuthenticableTrait;
    
    public $table = "profile";
    public $timestamps = false;
    
    public $primaryKey = "id";
    protected $fillable = ['user_id','name','phone','address','zip','city','state','country'];
}
