<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts () {
        //ikut convention:
        return $this->hasManyThrough('App\Post', 'App\User');

        //jika custom:
        //return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id');
    }
}
