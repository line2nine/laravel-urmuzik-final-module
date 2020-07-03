<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\PlaylistService;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    protected $playlistService;

    public function __construct(PlaylistService $playlistService)
    {
        $this->playlistService = $playlistService;
    }

    public function create(Request $request){
        $this->playlistService->create($request);

    }
}
