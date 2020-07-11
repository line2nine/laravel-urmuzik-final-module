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
        if ($request->hasFile('image')) {
            $songRepo->image = $request->image->store('images', 'public');
        } else {
            $songRepo->image = 'images/default-song.png';
        }
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
        $song->category_id = $request->category;
        $song->artist_id = $request->artists;
        $song->desc = $request->desc;
        $oldImage = $song->image;
        if ($request->hasFile('image')) {
            if ($oldImage !== 'images/default-song.png') {
                Storage::delete('public/' . $oldImage);
            }
            $song->image = $request->image->store('images', 'public');
        }

        $this->songRepo->save($song);
    }

    public function delete($id) {
        $song = $this->songRepo->find($id);
        if (Auth::user()->id = $song->user_id) {
            $this->songRepo->moveToDetailPlaylist($song);
            $this->songRepo->moveToLikes($song);
            $this->songRepo->moveToComments($song);

            if ($song->image !== 'images/default-song.png') {
                $oldImage = $song->image;
                Storage::delete('public/' . $oldImage);
            }
            $fileMp3 = $song->type;
            Storage::delete('public/' . $fileMp3);
            $this->songRepo->delete($song);

            return true;
        } else {
            return false;
        }
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
