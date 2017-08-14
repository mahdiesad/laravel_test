<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User_api extends Model
{
    use Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $guarded = ['id'];
    protected $table = 'user_api';
    //protected $name='person';
    protected $fillable = [
       'id' ,'userId','token','device'

    ];

    public function userId()
    {
        return $this->hasOne('User','userId');
    }
//    public function friend_id()
//    {
//        return $this->hasOne('User','friendId');
//    }
//
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password'
//    ];
}
