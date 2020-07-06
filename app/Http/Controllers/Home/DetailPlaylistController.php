<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\DetailPlaylistService;
use App\Http\Services\PlaylistService;
use App\Http\Services\SongService;
use Illuminate\Http\Request;

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

    public function addSong($playlist_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $songs = $this->songService->getAll();

        return view('home.playlist.detail.add-song', compact('playlist', 'songs'));
    }

    public function storeSong(Request $request, $playlist_id)
    {
        $this->detailPlaylistService->addSongPlaylist($request, $playlist_id);

        return redirect(route('playlist.detail', ['playlist_id' => $playlist_id]));
    }
}
