<?php


namespace App\Http\Services;


use App\Http\Repositories\LikeRepository;
use App\Like;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;

class LikeService
{
    protected $likeRepo;
    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepo = $likeRepository;
    }

    public function getAll($id)
    {
        return $this->likeRepo->getAll($id);
    }

    public function getLiked()
    {
        return $this->likeRepo->getLiked();
    }

    public function like($id)
    {
        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->song_id = $id;
        $this->likeRepo->save($like);
    }

    public function find($id,$user_id)
    {
        return $this->likeRepo->find($id,$user_id);
    }

    public function unlike($like)
    {
        $this->likeRepo->unlike($like);
    }

    public function deleteAllLike($song_id) {
        $likes = $this->likeRepo->getLikesOfSong($song_id);

        foreach ($likes as $like) {
            if (Auth::user()->id === $like->song->user_id){
                $this->likeRepo->delete($like);
            } else {
                return false;
            }
        }

        return true;
    }
}
