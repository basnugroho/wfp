<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    //post ini milik user
    public function user () {
        return $this->belongsTo('App\User');
    }

    //morphMany (Polymhorpic)
    public function photos () {
        //morph from what?
        return $this->morphMany('App\Photo', 'imagable');
    }

    //morphToMany (many to many Polymhorpic)
    public function tags () {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}

