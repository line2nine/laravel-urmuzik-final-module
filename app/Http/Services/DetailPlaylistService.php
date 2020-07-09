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

    public function addSongPlaylist($request, $playlist)
    {
        if (isset($request->song)) {
            $songsId = $request->song;
            $songsOfPlayList = $playlist->songs;
            foreach ($songsId as $songId) {
                if (!$songsOfPlayList->contains('song_id', $songId)) {
                    $playlist->songs()->attach($songId);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function deleteSong($playlist, $song_id)
    {
        if (Auth::user()->id === $playlist->user->id) {
            $playlist->songs()->detach($song_id);

            return true;
        } else {
            return false;
        }
    }
}
