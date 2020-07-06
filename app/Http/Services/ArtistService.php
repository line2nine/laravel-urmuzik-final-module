<?php


namespace App\Http\Services;


use App\Artist;
use App\Http\Repositories\ArtistRepository;
use App\Http\Repositories\SongRepository;

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

    public function update($request, $artistRepo)
    {
        $artistRepo->name = $request->name;
        $this->artistRepo->save($artistRepo);
    }

    public function detail($id)
    {
        return $this->artistRepo->filter($id);
    }
}
