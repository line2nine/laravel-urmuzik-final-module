<?php

namespace App\Http\Controllers\Music;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Http\Requests\UpdateSong;
use App\Http\Services\SongService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

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
//        dd($songs[1]);
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
        Session::put('idCurrentSong',"$song->id");

        // lay ra bai hat tiep theo
        $songs = $this->songService->getAll();
        for ($i = 0; $i < count($songs); $i++){
            if ($i+1 == count($songs)){
                $nextSong = $songs[0]->id;
                return view('song.play',compact('song','nextSong'));
            } elseif($songs[$i]->id == Session::get('idCurrentSong')) {
                $nextSong = $songs[$i+1]->id;
                return view('song.play',compact('song','nextSong'));
            }
        }
    }

    public function listSongUser($id)
    {
        $songs = $this->songService->getSongUser($id);
        return view('song.songuser',compact('songs'));
    }

    public function edit($id)
    {
        $song = $this->songService->find($id);
        $categories = Category::all();
        $artists = Artist::all();
        return view('song.edit',compact('song','categories','artists'));
    }


    public function update(UpdateSong $request, $id)
    {
        $song = $this->songService->find($id);
        $this->songService->update($song, $request);
        Session::flash('success','Update Completed');
        $user = Auth::user();
        return redirect()->route('music.list.user',['id'=>$user->id]);
    }


    public function destroy($id)
    {
        $song = $this->songService->find($id);
        $song->delete();
        Session::flash('success','Delete Completed');
        $user = Auth::user();
        return redirect()->route('music.list.user',['id'=>$user->id]);
    }

}
