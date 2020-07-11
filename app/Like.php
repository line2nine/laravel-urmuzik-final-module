<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function song()
    {
        return $this->belongsTo(Song::class);
    }
}
