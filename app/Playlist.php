<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';

    function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    function song()
    {
        return $this->belongsToMany('App\Song','detail_playlist');
    }
}
