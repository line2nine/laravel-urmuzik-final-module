<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Services\ArtistService;
use App\Http\Services\SongService;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    protected $artistService;
    protected $songService;

    public function __construct(ArtistService $artistService, SongService $songService)
    {
        $this->artistService = $artistService;
        $this->songService = $songService;
    }

    public function index()
    {
        $artists = $this->artistService->getAll();
        return view('home.singer.singer', compact('artists'));
    }

    public function create()
    {
        return view('artist.create');
    }

    public function store(Request $request)
    {
        $this->artistService->create($request);
        return redirect()->route('artist.list');
    }

    public function show($id)
    {
        $songs = $this->songService->getSongArtist($id);
        return view('home.singer.singer-song', compact('songs'));
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
        return redirect()->route('artist.list');
    }

    public function destroy($id)
    {
        $artist = $this->artistService->find($id);
        $artist->delete();
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
