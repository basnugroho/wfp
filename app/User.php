<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //one to one
    public function post () {
        return $this->hasOne('App\Post');
    }

    public function dosen () {
        return $this->hasOne('App\Dosen');
    }

    //one to many
    public function posts () {
        return $this->hasMany('App\Post');
    }

    //many to many
    public function roles () {
        return $this->belongsToMany('App\Role')->withPivot('created_at');
        //kalo gak ikut convention (custom):
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    //morphMany (Polymhorpic)
    public function photos () {
        return $this->morphMany('App\Photo', 'imagable');
    }
}
