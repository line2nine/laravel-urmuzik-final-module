<?php


namespace App\Http\Repositories;


use App\Playlist;
use Illuminate\Support\Facades\Auth;

class PlaylistRepository
{
    protected $playlist;

    public function __construct(Playlist $playlist)
    {
        $this->playlist = $playlist;
    }

    public function getAll()
    {
        return $this->playlist->all();
    }

    public function recentlyCreated()
    {
        return $this->playlist->orderby('created_at', 'desc')->paginate(5);
    }

    public function topTrending()
    {
        return $this->playlist->orderby('view', 'desc')->paginate(5);
    }

    public function myPlaylist()
    {
        return $this->playlist->where('user_id', Auth::user()->id)->get();
    }

    public function find($id)
    {
        return $this->playlist->findOrFail($id);
    }

    public function save($playlist)
    {
        $playlist->save();
    }

    public function searchPlaylist($keyword)
    {
        return $this->playlist->where('title', 'LIKE', '%' . $keyword . '%')->get();
    }

    public function delete($playlist)
    {
        $playlist->delete();
    }

    public function moveToDetailPlaylist($playlist)
    {
        $playlist->detailPlaylist()->delete();
    }

    public function view($id)
    {
        return $this->find($id)->increment('view');
    }
}
