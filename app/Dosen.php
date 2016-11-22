<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public function user () {
        return $this->belongsTo('App\User');
    }

    public function mahasiswas () {
        return$this->belongsTo('App\Mahasiswa');
    }
}
