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
}
