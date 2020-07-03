<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\DetailPlaylistService;
use App\Http\Services\PlaylistService;
use Illuminate\Http\Request;

class DetailPlaylistController extends Controller
{
    protected $detailPlaylistService;
    protected $playlistService;

    public function __construct(DetailPlaylistService $detailPlaylistService, PlaylistService $playlistService)
    {
        $this->detailPlaylistService = $detailPlaylistService;
        $this->playlistService = $playlistService;
    }

    public function index($playlist_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $listSong = $this->detailPlaylistService->getSongByPlaylistId($playlist_id);

        return view('home.playlist.detail.list-song', compact('playlist', 'listSong'));
    }
}
