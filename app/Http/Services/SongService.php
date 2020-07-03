<?php


namespace App\Http\Services;


use App\Http\Repositories\SongRepository;
use App\Song;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function find($id)
    {
        return $this->songRepo->find($id);
    }

    public function create($request)
    {
        $user = Auth::user();
        $songRepo = new Song();
        $songRepo->name = $request->name;
        $songRepo->type = $request->type->store('songs','public');
        $songRepo->image = $request->image->store('images','public');
        $songRepo->category_id = $request->category;
        $songRepo->artist_id = $request->artists;
        $songRepo->desc = $request->desc;
        $songRepo->user_id = $user->id;
        $this->songRepo->save($songRepo);
    }

    public function update($song, $request)
    {

    }

    public function searchByKeyword($request)
    {
        $keyword = $request->keyword;
        if ($keyword){
            return $this->songRepo->searchSong($keyword);
        }
        return false;
    }
}
