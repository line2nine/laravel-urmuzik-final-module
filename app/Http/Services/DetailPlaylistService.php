<?php


namespace App\Http\Services;


use App\DetailPlaylist;
use App\Http\Repositories\DetailPlaylistRepository;
use App\Http\Repositories\PlaylistRepository;
use App\Http\Repositories\SongRepository;
use Illuminate\Support\Facades\Auth;

class DetailPlaylistService
{
    protected $detailPlaylistRepository;
    protected $playlistRepository;
    protected $songRepository;

    public function __construct(DetailPlaylistRepository $detailPlaylistRepository, PlaylistRepository $playlistRepository, SongRepository $songRepository)
    {
        $this->detailPlaylistRepository = $detailPlaylistRepository;
        $this->playlistRepository = $playlistRepository;
        $this->songRepository = $songRepository;
    }

    public function getSongByPlaylistId($playlist_id)
    {
        return $this->detailPlaylistRepository->getSongByPlaylistId($playlist_id);
    }

    public function getPlaylistBySongId($song_id)
    {
        return $this->detailPlaylistRepository->getPlaylistBySongId($song_id);
    }

    public function getSongNotExitPlaylist($playlist_id)
    {
        $songOfPlaylist = $this->detailPlaylistRepository->getSongByPlaylistId($playlist_id);
        $songAll = $this->songRepository->getAll();
        $idSongsNotExitPlaylist = $songAll->pluck('id')->diff($songOfPlaylist->pluck('song_id'));

        $songs = [];
        foreach ($idSongsNotExitPlaylist as $idSong) {
            $song = $this->songRepository->find($idSong);
            array_push($songs, $song);
        }
        return $songs;
    }

    public function getPlaylistNotExitSong($song_id)
    {
        $playlistContainsSong = $this->detailPlaylistRepository->getPlaylistBySongId($song_id);
        $playlistAll = $this->playlistRepository->getAll();
        $idPlaylistsNotExitSong = $playlistAll->pluck('id')->diff($playlistContainsSong->pluck('playlist_id'));

        $playlists = [];
        foreach ($idPlaylistsNotExitSong as $idPlaylist) {
            $playlist = $this->playlistRepository->find($idPlaylist);
            if ($playlist->user_id === Auth::user()->id) {
                array_push($playlists, $playlist);
            }
        }

        return $playlists;
    }

    public function addSongsPlaylist($request, $playlist)
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

    public function addSongToPlaylists($request, $song)
    {
        if (isset($request->playlist)) {
            $playlistsId = $request->playlist;
            $playlistContainsSong = $song->playlists;
            foreach ($playlistsId as $playlistId) {
                if (!$playlistContainsSong->contains('playlist_id', $playlistId)) {
                    $song->playlists()->attach($playlistId);
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
