<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\PlaylistService;
use App\Http\Services\SongService;
use App\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $songService;
    protected $playlistService;

    public function __construct(SongService $songService, PlaylistService $playlistService)
    {
        $this->songService = $songService;
        $this->playlistService = $playlistService;
    }

    public function index()
    {
        $songs = $this->songService->recentlyUploaded();
        $songsTrending = $this->songService->topTrending();
        $playlists = $this->playlistService->recentlyCreated();
        return view('home.home', compact('songs', 'songsTrending', 'playlists'));
    }
}
