<?php


namespace App\Http\Repositories;


use App\Playlist;

class PlaylistRepository
{
    protected $playlist;

    public function __construct(Playlist $playlist)
    {
        $this->playlist = $playlist;
    }

    public function getAll()
    {
        return $this->playlist->all();
    }

    public function find($id)
    {
        return $this->playlist->findOrFail($id);
    }

    public function save($playlist)
    {
        $playlist->save();
    }

    public function searchPlaylist($keyword)
    {
        return $this->playlist->where('title', 'LIKE', '%' . $keyword . '%')->get();
    }
}
