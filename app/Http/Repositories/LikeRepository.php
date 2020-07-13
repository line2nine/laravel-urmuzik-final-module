<?php


namespace App\Http\Repositories;


use App\Like;
use Illuminate\Support\Facades\DB;

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

    public function getLiked()
    {
        return DB::table('likes')->select('song_id', DB::raw('count(user_id)'))->groupBy('song_id')
            ->orderBy('count(user_id)','desc')->paginate(5);
    }

    public function unlike($unLike)
    {
        $unLike->delete();
    }

    public function getLikesOfSong($song_id)
    {
        return $this->like->where('song_id', $song_id)->get();
    }

    public function delete($like)
    {
        $like->delete();
    }
}
