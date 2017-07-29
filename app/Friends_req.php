<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Friends_req extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $guarded = ['id'];
    protected $table = 'friends_req';
    //protected $name='person';
    protected $fillable = [
       'id' ,'userId_1','userId_2'

    ];

    public function user_1()
    {
        return $this->hasOne('User','userId_1');
    }
    public function user_2()
    {
        return $this->hasOne('User','userId_2');
    }
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
