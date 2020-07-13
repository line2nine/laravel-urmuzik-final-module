<?php

namespace App\Http\Controllers;

use App\Http\Services\LikeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

//    public function like($id)
//    {
//        $this->likeService->like($id); // them ban ghi vao bang likes
//        return response()->json(
//            [
//                'status' => 'liked',
//                'likes' => $this->likeService->getAll($id)
//            ]
//        );
//    }

    public function like($id)
    {
        $user_id = Auth::user()->id;
        $checkLike = $this->likeService->find($id, $user_id);
        if (count($checkLike) > 0){
            $this->likeService->unlike($checkLike[0]);
            $liked = true;
        } else {
            $this->likeService->like($id); // them ban ghi vao bang likes
            $liked = false;
        }
        return response()->json(
            [
                'status' => 'success',
                'liked' => $liked,
                'likes' => count($this->likeService->getAll($id))
            ]
        );
    }

    public function unlike($id)
    {
        $user_id = Auth::user()->id;
        $unLike = $this->likeService->find($id, $user_id);
        $this->likeService->unlike($unLike[0]);
//        return redirect()->route('music.play', ['id' => $id]);

    }
}
