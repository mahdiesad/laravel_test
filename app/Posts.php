<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Posts extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $guarded = ['id'];
    protected $table = 'posts';
    //protected $name='person';
    protected $fillable = [
       'id' ,'userId','posts'

    ];

    public function user()
    {
        return $this->hasOne('User','userId');
    }
//    public function person()
//    {
//        return $this->belongsTo('User','id');
//    }
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
