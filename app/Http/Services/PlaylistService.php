<?php


namespace App\Http\Services;


use App\Http\Repositories\PlaylistRepository;
use App\Playlist;
use Illuminate\Support\Facades\Auth;

class PlaylistService
{
    protected $playlistRepository;

    public function __construct(PlaylistRepository $playlistRepository)
    {
        $this->playlistRepository = $playlistRepository;
    }

    public function getAll()
    {
        return $this->playlistRepository->getAll();
    }

    public function find($id)
    {
        return $this->playlistRepository->find($id);
    }

    public function create($request)
    {
        $user = Auth::user();
        $playlist = new Playlist();
        $playlist->title = $request->title;
        $playlist->user_id = $user->id;

        $this->playlistRepository->save($playlist);
    }

    public function update($song, $request)
    {

    }

    public function searchByKeyword($request)
    {
        $keyword = $request->keyword;
        if ($keyword){
            return $this->playlistRepository->searchSong($keyword);
        }
        return false;
    }
}
