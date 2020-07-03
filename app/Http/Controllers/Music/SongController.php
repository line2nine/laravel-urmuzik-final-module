<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Category;
use App\Http\Requests\SongRequest;
use App\Http\Services\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SongController extends Controller
{
    protected $songService;
    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    public function index()
    {
        $songs = $this->songService->getAll();
        return view('song.song',compact('songs'));
    }

    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.upload', compact('categories','artists'));
    }

    public function store(SongRequest $request)
    {
        $this->songService->create($request);
        Session::flash('success','Add Completed');
        return redirect()->route('music.upload');
    }


    public function show($id)
    {
        $song = $this->songService->find($id);
        return view('song.play',compact('song'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
