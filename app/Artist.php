<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';

    function songs() {
        return $this->hasMany('App\Song','artist_id');
    }
}
