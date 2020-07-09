<?php

namespace App\Http\Controllers\Music;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Http\Requests\UpdateSong;
use App\Http\Services\ArtistService;
use App\Http\Services\PlaylistService;
use App\Http\Services\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class SongController extends Controller
{
    protected $songService;
    protected $playlistService;
    protected $artistService;

    public function __construct(SongService $songService, PlaylistService $playlistService, ArtistService $artistService)
    {
        $this->songService = $songService;
        $this->playlistService = $playlistService;
        $this->artistService = $artistService;
    }

    public function index()
    {
        $songs = $this->songService->getAll();
        return view('song.song', compact('songs'));
    }

    public function indexDashboard()
    {
        $songs = $this->songService->getAll();
        return view('song.dashboard.list', compact('songs'));
    }

    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.upload', compact('categories', 'artists'));
    }

    public function createDashboard()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.dashboard.create', compact('categories', 'artists'));
    }

    public function store(SongRequest $request)
    {
        $this->songService->create($request);
        Session::flash('success', 'Add Completed');
        return redirect()->route('music.upload');
    }

    public function storeDashboard(SongRequest $request)
    {
        $this->songService->create($request);
        Session::flash('success', 'Add Completed');
        return redirect()->route('song.dashboard.list');
    }

    public function show($id)
    {
        $song = $this->songService->find($id);
        Session::put('idCurrentSong', "$song->id");
        // dem luot nghe bai hat
        $viewNumber = Session::get('viewKey' . $id);
        if (!Session::get('viewKey' . $id)) {
            Session::put('viewKey' . $id, 1);
            $this->songService->view($id);
        }
        // lay ra bai hat tiep theo
        $songs = $this->songService->getAll();
        for ($i = 0; $i < count($songs); $i++) {
            if ($i + 1 == count($songs)) {
                $nextSong = $songs[0]->id;
                return view('song.play', compact('song', 'nextSong'));
            } elseif ($songs[$i]->id == Session::get('idCurrentSong')) {
                $nextSong = $songs[$i + 1]->id;
                return view('song.play', compact('song', 'nextSong'));
            }
        }
    }

    public function listSongUser($id)
    {
        $songs = $this->songService->getSongUser($id);
        return view('song.songuser', compact('songs'));
    }

    public function edit($id)
    {
        $song = $this->songService->find($id);
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.edit', compact('song', 'categories', 'artists'));
    }


    public function update(UpdateSong $request, $id)
    {
        $song = $this->songService->find($id);
        $this->songService->update($song, $request);
        Session::flash('success', 'Update Completed');
        $user = Auth::user();
        return redirect()->route('music.list.user', ['id' => $user->id]);
    }


    public function destroy($id)
    {
        $song = $this->songService->find($id);
        $song->delete();
        Session::flash('success', 'Delete Completed');
        $user = Auth::user();
        return redirect()->route('music.list.user', ['id' => $user->id]);
    }

    public function destroyDashboard($id)
    {
        $song = $this->songService->find($id);
        $song->delete();
        Session::flash('success', 'Delete Completed');
        return redirect()->route('song.dashboard.list');
    }

    public function setView($id)
    {
        $song = $this->songService->find($id);
        $viewNumber = Session::get('viewKey');
        if (!Session::get('viewKey')) {
            Session::put('viewKey', 1);
            $song->increment('view');
        }
    }

    function search(Request $request) //dashboard
    {
        if ($this->songService->searchByKeyword($request)) {
            $songs = $this->songService->searchByKeyword($request);
            return view('song.dashboard.list', compact('songs'));
        }
        return redirect()->route('song.dashboard.list');
    }

    public function searchHome(Request $request) //home
    {
        switch ($request->select){
            case 'song':
                if ($this->songService->searchHome($request->keyword)) {
                    $songs = $this->songService->searchHome($request->keyword);
                    return view('song.song', compact('songs'));
                }
                return redirect()->route('music.index');
            case 'playlist':
                if ($this->playlistService->searchByKeyword($request->keyword)) {
                    $playlists = $this->playlistService->searchByKeyword($request->keyword);
                    return view('home.playlist.list', compact('playlists'));
                }
                return redirect()->route('playlist.index');
            case 'artist':
                if ($this->artistService->searchByKeyword($request->keyword)) {
                    $artists = $this->artistService->searchByKeyword($request->keyword);
                    return view('home.singer.singer', compact('artists'));
                }
                return redirect()->route('artist.index');
            default:
                abort(404);
                break;
        }
    }
}
