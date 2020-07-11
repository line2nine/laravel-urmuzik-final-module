<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function song()
    {
        return $this->belongsTo(Song::class);
    }

}
