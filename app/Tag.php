<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //this Tag gonna be shared by many entities/models

    public function posts () {

        return $this->morphedByMany('App\Post', 'taggable');
    }

    public function videos () {
        return $this->morphedByMany('App\Videos', 'taggable');
    }
}
