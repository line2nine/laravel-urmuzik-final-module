<?php


namespace App\Http\Repositories;


use App\Song;

class SongRepository
{
    protected $song;

    public function __construct(Song $song)
    {
        $this->song = $song;
    }

    public function getAll()
    {
        return $this->song->all();
    }

    public function recentlyUploaded()
    {
        return $this->song->orderby('created_at', 'desc')->paginate(5);
    }

    public function topTrending()
    {
        return $this->song->orderby('view', 'desc')->paginate(5);
    }

    public function find($id)
    {
        return $this->song->findOrFail($id);
    }

    public function getSongUser($id)
    {
        return $this->song->where('user_id', '=', $id)->get();
    }

    public function getSongArtist($id)
    {
        return $this->song->where('artist_id', '=', $id)->get();
    }

    public function save($song)
    {
        $song->save();
    }

    public function delete($song)
    {
        $song->delete();
    }

    public function searchSong($keyword)
    {
        return $this->song->where('name', 'LIKE', '%' . $keyword . '%')->get();
    }

    public function view($id)
    {
        return $this->find($id)->increment('view');
    }

    public function moveToDetailPlaylist($song)
    {
        $song->detailPlaylist()->delete();
    }

    public function moveToLikes($song)
    {
        $song->likes()->delete();
    }

    public function moveToComments($song)
    {
        $song->comments()->delete();
    }
}
