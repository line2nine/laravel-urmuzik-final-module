<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPlaylist extends Model
{
    protected $table = 'detail_playlists';

    function song()
    {
        return $this->belongsTo('App\Song', 'song_id');
    }

    function playlist()
    {
        return $this->belongsTo('App\Playlist', 'playlist_id');
    }
}
