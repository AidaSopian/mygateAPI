<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'user_id';

    protected $fillable = [
<<<<<<< HEAD
        'username', 'email', 'password', 'avatar', 'activation_token',
=======
        'username', 'email', 'password', 'active', 'activation_token', 'avatar'
>>>>>>> b95c157d66ade59054ac70b9981f6cbaea144b11
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    protected $appends = ['avatar_url'];
    
    public function getAvatarUrlAttribute()
    {
        return Storage::url('avatars/'.$this->user_id.'/'.$this->avatar);
    }
}
