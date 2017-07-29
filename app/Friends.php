<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Friends extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $guarded = ['id'];
    protected $table = 'friends';
    //protected $name='person';
    protected $fillable = [
       'id' ,'userId','friendId'

    ];

    public function friend()
    {
        return $this->hasOne('User','userId');
    }
    public function friend_id()
    {
        return $this->hasOne('User','friendId');
    }
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
