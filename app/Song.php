<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    function artist() {
        return $this->belongsTo('App\Artist','artist_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
