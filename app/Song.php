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

    function detailPlaylist()
    {
        return $this->hasMany('App\DetailPlaylist', 'song_id');
    }

    function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'song_id');
    }

    function likes()
    {
        return $this->hasMany(Like::class);
    }
}
