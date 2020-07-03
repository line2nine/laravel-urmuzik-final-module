<?php


namespace App\Http\Services;


use App\Http\Repositories\DetailPlaylistRepository;

class DetailPlaylistService
{
    protected $detailPlaylistRepository;

    public function __construct(DetailPlaylistRepository $detailPlaylistRepository)
    {
        $this->detailPlaylistRepository = $detailPlaylistRepository;
    }

    public function getSongByPlaylistId($playlist_id)
    {
        return $this->detailPlaylistRepository->getSongByPlaylistId($playlist_id);
    }

}
