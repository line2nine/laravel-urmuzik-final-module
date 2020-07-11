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

    public function getPlaylistBySongId($song_id)
    {
        return $this->detailPlaylist->where('song_id', $song_id)->get();
    }

    public function save($detailPlaylist)
    {
        $detailPlaylist->save();
    }

    public function delete($detailPlaylist)
    {
        $detailPlaylist->detele();
    }
}
