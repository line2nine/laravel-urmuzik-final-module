<?php


namespace App\Http\Repositories;


use App\DetailPlaylist;

class DetailPlaylistRepository
{
    protected $detailPlaylist;

    public function __construct(DetailPlaylist $detailPlaylist)
    {
        $this->detailPlaylist = $detailPlaylist;
    }

    public function getSongByPlaylistId($playlist_id)
    {
        return $this->detailPlaylist->where('playlist_id', $playlist_id)->get();
    }

    public function save()
    {
        $this->detailPlaylist->save();
    }
}
