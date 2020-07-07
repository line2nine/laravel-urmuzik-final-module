<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\DetailPlaylistService;
use App\Http\Services\PlaylistService;
use App\Http\Services\SongService;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailPlaylistController extends Controller
{
    protected $detailPlaylistService;
    protected $playlistService;
    protected $songService;

    public function __construct(DetailPlaylistService $detailPlaylistService, PlaylistService $playlistService, SongService $songService)
    {
        $this->detailPlaylistService = $detailPlaylistService;
        $this->playlistService = $playlistService;
        $this->songService = $songService;
    }

    public function index($playlist_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $listSong = $this->detailPlaylistService->getSongByPlaylistId($playlist_id);

        return view('home.playlist.detail.list-song', compact('playlist', 'listSong'));
    }

    public function play($playlist_id, $song_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $listSong = $this->detailPlaylistService->getSongByPlaylistId($playlist_id);
        $song = $this->songService->find($song_id);
        Session::put('idCurrentSong', "$song->id");
        for ($i = 0; $i < count($listSong); $i++) {
            if ($i + 1 == count($listSong)) {
                $nextSong = $listSong[0];
                return view('home.playlist.detail.play-song', compact('playlist', 'listSong', 'song', 'nextSong'));
            } elseif ($listSong[$i]->song_id == Session::get('idCurrentSong')) {
                $nextSong = $listSong[$i + 1];
                return view('home.playlist.detail.play-song', compact('playlist', 'listSong', 'song', 'nextSong'));
            }
        }
    }

    public function addSong($playlist_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $songOfPlaylist = $this->detailPlaylistService->getSongByPlaylistId($playlist_id);
        $songAll = $this->songService->getAll();
        $idSongsNotExitPlaylist = $songAll->pluck('id')->diff($songOfPlaylist->pluck('song_id'));

        $songs = [];
        foreach ($idSongsNotExitPlaylist as $idSong) {
            $song = $this->songService->find($idSong);
            array_push($songs, $song);
        }

        return view('home.playlist.detail.add-song', compact('playlist', 'songs'));
    }

    public function storeSong(Request $request, $playlist_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $status = $this->detailPlaylistService->addSongPlaylist($request, $playlist);

        if ($status) {
            $message = 'them bai hat thanh cong';
            session()->flash('success', $message);
        }

        return redirect(route('playlist.detail', ['playlist_id' => $playlist->id]));
    }

    public function deleteSong($playlist_id, $song_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $this->detailPlaylistService->deleteSong($playlist, $song_id);

        $message = 'xoa bai hat thanh cong';
        session()->flash('success', $message);

        return back();
    }
}
