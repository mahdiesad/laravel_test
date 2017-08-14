<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */
    protected $guarded = ['id'];
    protected $table = 'person';
    //protected $name='person';
    protected $fillable = [
        'ID' ,'UserName', 'LastName', 'FirstName','Age', 'password','role_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function getAuthPassword () {

        return $this->password;

    }
    public function role()
    {
        return $this->hasOne('Roles','role_id');
    }

    public function img()
    {
        return $this->belongsTo('Images','id');
    }
    public function post()
    {
        return $this->belongsTo('Posts','id');
    }
    public function friend()
    {
        return $this->belongsTo('Friends','id');
    }
    public function friend_req()
    {
        return $this->belongsTo('Friends_req','id');
    }
    public function user_api()
    {
        return $this->belongsTo('Usre_api','id');
    }
    public function isAdmin()
    {
        return $this->role_id; // this looks for an admin column in your users table
    }
}
