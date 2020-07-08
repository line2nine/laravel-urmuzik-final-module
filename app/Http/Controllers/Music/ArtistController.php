<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Services\ArtistService;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    protected $artistService;

    public function __construct(ArtistService $artistService)
    {
        $this->artistService = $artistService;
    }

    public function index()
    {
        $artists = $this->artistService->getAll();
        return view('home.singer.singer',compact('artists'));
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
        //
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
