<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //morphTo, akan diakses oleh User dan Post
    public function imagable () {
        return $this->morphTo();
    }
}
