<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePlaylistRequest;
use App\Http\Requests\EditPlaylistRequest;
use App\Http\Services\PlaylistService;
use Illuminate\Support\Facades\Session;

class PlaylistController extends Controller
{
    protected $playlistService;

    public function __construct(PlaylistService $playlistService)
    {
        $this->playlistService = $playlistService;
    }

    public function index()
    {
        $playlists = $this->playlistService->getAll();

        return view('home.playlist.list', compact('playlists'));
    }

    public function myPlaylist()
    {
        $myPlaylists = $this->playlistService->myPlaylist();

        return view('home.playlist.my-playlist', compact('myPlaylists'));
    }

    public function create(CreatePlaylistRequest $request)
    {
        $this->playlistService->create($request);

        return redirect(route('my-playlist'));
    }

    public function delete($playlist_id)
    {
        $status = $this->playlistService->delete($playlist_id);
        if ($status) {
            $message = 'Delete completed';
            Session::flash('success',$message);
            return redirect(route('my-playlist'));
        } else {
            return abort(403);
        }
    }

    public function update($playlist_id, EditPlaylistRequest $request)
    {
        $status = $this->playlistService->update($request, $playlist_id);
        if ($status) {
            $message = 'Update completed';
            Session::flash('success',$message);
            return back();
        } else {
            return abort(403);
        }
    }
}
