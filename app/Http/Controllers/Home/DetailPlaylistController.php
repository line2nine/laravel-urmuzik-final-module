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
        $viewNumber = Session::get('viewKey' . $playlist_id);
        if (!Session::get('viewKey' . $playlist_id)) {
            Session::put('viewKey' . $playlist_id, 1);
            $this->playlistService->view($playlist_id);
        }
        $song = $this->songService->find($song_id);
        Session::put('idCurrentSong', "$song->id");
        for ($i = 0; $i < count($listSong); $i++) {
            if (($i + 1) == count($listSong)) {
                $nextSong = $listSong[0];
                return view('home.playlist.detail.play-song', compact('playlist', 'listSong', 'song', 'nextSong'));
            } elseif ($listSong[$i]->song_id == Session::get('idCurrentSong')) {
                $nextSong = $listSong[$i + 1];
                return view('home.playlist.detail.play-song', compact('playlist', 'listSong', 'song', 'nextSong'));
            }
        }
    }

    public function setView($id)
    {
        $playlist = $this->playlistService->find($id);
        $viewNumber = Session::get('viewKey');
        if (!Session::get('viewKey')) {
            Session::put('viewKey', 1);
            $playlist->increment('view');
        }
    }

    public function addSong($playlist_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $songs = $this->detailPlaylistService->getSongNotExitPlaylist($playlist_id);

        return view('home.playlist.detail.add-song', compact('playlist', 'songs'));
    }

    public function storeSong(Request $request, $playlist_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $status = $this->detailPlaylistService->addSongsPlaylist($request, $playlist);

        if ($status) {
            \alert("Add Song Completed !", '', 'success')->autoClose(2000)->timerProgressBar();

            return redirect(route('playlist.detail', ['playlist_id' => $playlist->id]));
        } else {
            return back();
        }
    }

    public function deleteSong($playlist_id, $song_id)
    {
        $playlist = $this->playlistService->find($playlist_id);
        $status = $this->detailPlaylistService->deleteSong($playlist, $song_id);
        if ($status) {
            return response()->json(
                [
                    'status' => 'success'
                ]
            );
        } else {
            return abort(403);
        }
    }
}
