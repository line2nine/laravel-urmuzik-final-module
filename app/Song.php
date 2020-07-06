<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    function playlists()
    {
        return $this->belongsToMany('App\Playlist', 'detail_playlists');
    }
}
