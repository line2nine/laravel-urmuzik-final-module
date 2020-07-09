<?php


namespace App\Http\Repositories;


use App\Like;

class LikeRepository
{
    protected $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    public function index()
    {
        //
    }

    public function getAll($id)
    {
        return $this->like->where('song_id', '=', $id)->get();
    }

    public function save($like)
    {
        $like->save();
    }

    public function find($id, $user_id)
    {
        return $this->like->where('song_id','=',$id)->where('user_id','=',$user_id)->get();
    }

    public function unlike($unLike)
    {
        $unLike->delete();
    }

}
