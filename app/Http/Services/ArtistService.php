<?php


namespace App\Http\Services;


use App\Artist;
use App\Http\Repositories\ArtistRepository;
use App\Http\Repositories\SongRepository;
use Illuminate\Support\Facades\Storage;

class ArtistService
{
    protected $artistRepo;
    protected $songRepo;

    public function __construct(ArtistRepository $artistRepo, SongRepository $songRepo)
    {
        $this->artistRepo = $artistRepo;
        $this->songRepo = $songRepo;
    }

    public function getAll()
    {
        return $this->artistRepo->getAll();
    }

    public function create($request)
    {
        $artist = new Artist();
        $artist->name = $request->name;
        if ($request->hasFile('image')) {
            $artist->image = $request->image->store('images', 'public');
        } else {
            $artist->image = 'images/default-avatar.png';
        }
        $this->artistRepo->save($artist);
    }

    public function find($id)
    {
        return $this->artistRepo->find($id);
    }

    public function update($request, $artist)
    {
        $oldFilePath = $artist->image;
        $artist->name = $request->name;

        if ($request->hasFile('image')) {
            if ($oldFilePath !== 'images/default-avatar.png') {
                Storage::delete("public/" . $oldFilePath);
            }
            $artist->image = $request->image->store('images', 'public');
        }
        $this->artistRepo->save($artist);
    }

    public function detail($id)
    {
        return $this->artistRepo->filter($id);
    }

    public function searchByKeyword($keyword)
    {
        if ($keyword) {
            return $this->artistRepo->search($keyword);
        }
        return false;
    }
}
