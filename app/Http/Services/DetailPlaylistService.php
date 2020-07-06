<?php


namespace App\Http\Services;


use App\DetailPlaylist;
use App\Http\Repositories\DetailPlaylistRepository;
use Illuminate\Support\Facades\Auth;

class DetailPlaylistService
{
    protected $detailPlaylistRepository;

    public function __construct(DetailPlaylistRepository $detailPlaylistRepository)
    {
        $this->detailPlaylistRepository = $detailPlaylistRepository;
    }

    public function getSongByPlaylistId($playlist_id)
    {
        return $this->detailPlaylistRepository->getSongByPlaylistId($playlist_id);
    }

    public function addSongPlaylist($request, $playlist_id)
    {
        $count = $request->count;
        for ($i = 0; $i < $count; $i++) {
            $requestSongId = $request->input('song' . $i);
            if ($requestSongId !== null) {
                $detailPlaylist = new DetailPlaylist();
                $detailPlaylist->song_id = $requestSongId;
                $detailPlaylist->playlist_id = $playlist_id;
                $this->detailPlaylistRepository->save($detailPlaylist);
            }
        }
    }

}
