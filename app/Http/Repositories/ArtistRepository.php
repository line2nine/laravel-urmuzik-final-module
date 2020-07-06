<?php


namespace App\Http\Repositories;


use App\Artist;

class ArtistRepository
{
    protected $artist;

    public function __construct(Artist $artist)
    {
        $this->artist = $artist;
    }

    public function getAll()
    {
        return $this->artist->all();
    }

    public function find($id)
    {
        return $this->artist->findOrFail($id);
    }

    public function save($artist)
    {
        $artist->save();
    }

    public function search($keyword)
    {
        return $this->artist->where('name', 'LIKE', '%' . $keyword . '%')->get();
    }
}
