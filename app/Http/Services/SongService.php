<?php


namespace App\Http\Services;


use App\Http\Repositories\SongRepository;
use App\Song;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use MongoDB\Driver\Session;
use Symfony\Component\Console\Input\Input;

class SongService
{
    protected $songRepo;

    public function __construct(SongRepository $songRepo)
    {
        $this->songRepo = $songRepo;
    }

    public function getAll()
    {
        return $this->songRepo->getAll();
    }

    public function recentlyUploaded()
    {
        return $this->songRepo->recentlyUploaded();
    }

    public function topTrending()
    {
        return $this->songRepo->topTrending();
    }

    public function getSongUser($id)
    {
        return $this->songRepo->getSongUser($id);
    }

    public function getSongArtist($id)
    {
        return $this->songRepo->getSongArtist($id);
    }

    public function find($id)
    {
        return $this->songRepo->find($id);
    }

    public function view($id)
    {
        return $this->songRepo->view($id);
    }

    public function create($request)
    {
        $user = Auth::user();
        $songRepo = new Song();
        $default = 0;
        $songRepo->name = $request->name;
        $songRepo->type = $request->type->store('songs', 'public');
        $songRepo->image = $request->image->store('images', 'public');
        $songRepo->category_id = $request->category;
        $songRepo->artist_id = $request->artists;
        $songRepo->desc = $request->desc;
        $songRepo->user_id = $user->id;
        $songRepo->view = $default;

        $this->songRepo->save($songRepo);
    }

    public function update($song, $request)
    {
        $song->name = $request->name;
        if ($request->hasFile('image')) {
            $song->image = $request->image->store('images', 'public');
        }
        if ($request->hasFile('type')) {
            $song->type = $request->type->store('songs', 'public');
        }
        $song->category_id = $request->category;
        $song->artist_id = $request->artists;
        $song->desc = $request->desc;

        $this->songRepo->save($song);
    }

    public function searchByKeyword($request)
    {
        $keyword = $request->keyword;
        if ($keyword) {
            return $this->songRepo->searchSong($keyword);
        }
        return false;
    }

    public function searchHome($keyword)
    {
        if ($keyword) {
            return $this->songRepo->searchSong($keyword);
        }
        return false;
    }
}
