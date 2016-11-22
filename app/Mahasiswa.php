<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public function dosens () {
        return$this->belongsTo('App\Dosen');
    }
}
