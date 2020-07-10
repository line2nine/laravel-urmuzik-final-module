<?php


namespace App\Http\Services;


use App\Http\Repositories\DetailPlaylistRepository;
use App\Http\Repositories\PlaylistRepository;
use App\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function topTrending()
    {
        return $this->playlistRepository->topTrending();
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
        $default = 0;
        $playlist->title = $request->title;
        if ($request->hasFile('image')) {
            $playlist->image = $request->image->store('images', 'public');
        } else {
            $playlist->image = 'images/default-playlist.jpg';
        }
        $playlist->user_id = $user->id;
        $playlist->view = $default;

        $this->playlistRepository->save($playlist);
    }

    public function update($request, $id)
    {
        $playlist = $this->playlistRepository->find($id);

        if (Auth::user()->id === $playlist->user->id) {
            $playlist->title = $request->title;
            if ($request->hasFile('image')) {
                if ($playlist->image !== 'images/default-playlist.jpg') {
                    $oldImage = $playlist->image;
                    Storage::delete('public/' . $oldImage);
                }
                $playlist->image = $request->image->store('images', 'public');
            }
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
            if ($playlist->image !== 'images/default-playlist.jpg') {
                $oldImage = $playlist->image;
                Storage::delete('public/' . $oldImage);
            }
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

    public function view($id)
    {
        return $this->playlistRepository->view($id);
    }
}
