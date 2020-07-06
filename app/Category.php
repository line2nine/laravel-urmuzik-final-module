<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function song()
    {
        return $this->hasMany(Song::class,'category_id');
    }
}
