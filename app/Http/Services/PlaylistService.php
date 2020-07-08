<?php


namespace App\Http\Services;


use App\Http\Repositories\DetailPlaylistRepository;
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

    public function recentlyCreated()
    {
        return $this->playlistRepository->recentlyCreated();
    }

    public function myPlaylist()
    {
        if ($this->playlistRepository->myPlaylist()) {
            return $this->playlistRepository->myPlaylist();
        } else {
            return null;
        }
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

    public function update($request, $id)
    {
        $playlist = $this->playlistRepository->find($id);

        if (Auth::user()->id === $playlist->user->id) {
            $playlist->title = $request->title;
            $this->playlistRepository->save($playlist);

            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $playlist = $this->playlistRepository->find($id);

        if (Auth::user()->id === $playlist->user->id) {
            $this->playlistRepository->moveToDetailPlaylist($playlist);
            $this->playlistRepository->delete($playlist);
            return true;
        } else {
            return false;
        }
    }

    public function searchByKeyword($keyword)
    {
        if ($keyword) {
            return $this->playlistRepository->searchPlaylist($keyword);
        }
        return false;
    }
}
