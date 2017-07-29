<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Images extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $guarded = ['id'];
    protected $table = 'images';
    //protected $name='person';
    protected $fillable = [
       'id' ,'userId','img_name'

    ];

    public function person()
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
