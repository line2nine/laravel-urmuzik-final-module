<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    function playlist()
    {
        return $this->belongsToMany('App\Playlist', 'detail_playlist');
    }
}
