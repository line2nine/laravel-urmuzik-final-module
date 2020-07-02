<?php


namespace App\Http\Services;


use App\Http\Repositories\SongRepository;
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
