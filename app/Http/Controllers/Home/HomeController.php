<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\LikeService;
use App\Http\Services\PlaylistService;
use App\Http\Services\SongService;
use App\Song;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $songService;
    protected $playlistService;
    protected $likeService;

    public function __construct(SongService $songService, PlaylistService $playlistService, LikeService $likeService)
    {
        $this->songService = $songService;
        $this->playlistService = $playlistService;
        $this->likeService = $likeService;
    }

    public function index()
    {
        $songs = $this->songService->recentlyUploaded();
        $songsTrending = $this->songService->topTrending();
        $recentPlaylists = $this->playlistService->recentlyCreated();
        $trendingPlaylists = $this->playlistService->topTrending();
        $likes = $this->likeService->getLiked();
        $songLike = [];
        for ($i = 0; $i < 5; $i++)
        {
            $song = $this->songService->find($likes[$i]->song_id);
            array_push($songLike, $song);
        }
        return view('home.home', compact('songs', 'songsTrending', 'recentPlaylists', 'trendingPlaylists', 'songLike', 'likes'));
    }

    public function showContact()
    {
        return view('home.contact.contact');
    }

}
