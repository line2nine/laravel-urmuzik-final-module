<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Services\ArtistService;
use App\Http\Services\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArtistController extends Controller
{
    protected $artistService;
    protected $songService;

    public function __construct(ArtistService $artistService, SongService $songService)
    {
        $this->artistService = $artistService;
        $this->songService = $songService;
    }

    public function list()
    {
        $artists = $this->artistService->getAll();
        return view('home.singer.singer', compact('artists'));
    }

    public function index()
    {
        $artists = $this->artistService->getAll();
        return view('artist.list', compact('artists'));
    }

    public function create()
    {
        return view('artist.create');
    }

    public function store(Request $request)
    {
        $this->artistService->create($request);
        \alert("Create Completed !", '', 'success')->autoClose(2000)->timerProgressBar();

        return redirect()->route('artist.list');
    }

    public function show($id)
    {
        $songs = $this->songService->getSongArtist($id);
        $artist = $this->artistService->find($id);
        return view('home.singer.singer-song', compact('songs', 'artist'));
    }

    public function play($artist_id, $song_id)
    {

        $listSong = $this->songService->getSongArtist($artist_id);
        $artist = $this->artistService->find($artist_id);
        $song = $this->songService->find($song_id);
        Session::put('idCurrentSong', "$song->id");
        for ($i = 0; $i < count($listSong); $i++) {
            if (($i + 1) == count($listSong)) {
                $nextSong = $listSong[0];
                return view('home.singer.play-song-singer', compact('song', 'listSong', 'artist', 'nextSong'));
            } elseif ($listSong[$i]->id == Session::get('idCurrentSong')) {
                $nextSong = $listSong[$i + 1];
                return view('home.singer.play-song-singer', compact('song', 'listSong', 'artist', 'nextSong'));
            }
        }
    }

    public function edit($id)
    {
        $artist = $this->artistService->find($id);
        return view('artist.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
        $artist = $this->artistService->find($id);
        $this->artistService->update($request, $artist);
        \alert("Update Completed !", '', 'success')->autoClose(2000)->timerProgressBar();

        return redirect()->route('artist.list');
    }

    public function destroy($id)
    {
        $artist = $this->artistService->find($id);
        $artist->delete();
        notify("Deleted Completed !", 'success');

        return redirect()->route('artist.list');
    }

    function search(Request $request)
    {
        if ($this->artistService->searchByKeyword($request)) {
            $artists = $this->artistService->searchByKeyword($request);
            return view('artist.list', compact('artists'));
        }
        return redirect()->route('artist.list');
    }
}
