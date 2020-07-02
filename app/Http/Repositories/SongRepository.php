<?php


namespace App\Http\Repositories;


use App\Song;

class SongRepository
{
    protected $song;

    public function __construct(Song $song)
    {
        $this->song = $song;
    }

    public function getAll()
    {
        return $this->song->all();
    }

    public function find($id)
    {
        return $this->song->findOrFail($id);
    }

    public function save($song)
    {
        $song->save();
    }

    public function searchSong($keyword)
    {
        return $this->song->where('name', 'LIKE', '%' . $keyword . '%')->get();
    }
}
