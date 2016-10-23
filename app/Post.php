<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    public function user () {
        return $this->belongsTo('App\User');
    }

    //morphMany
    public function photos () {
        //morph from what?
        return $this->morphMany('App\Photo', 'imagable');
    }
}

