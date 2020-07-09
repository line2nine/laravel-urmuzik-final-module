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

    public function checkLike($id)
    {
        $user_id = Auth::user()->id;
        $check = $this->likeService->find($id,$user_id);

    }

    public function like($id)
    {
        $this->likeService->like($id);
        return redirect()->route('music.play',['id'=>$id]);
    }

    public function unlike($id)
    {
        $user_id = Auth::user()->id;
        $unLike = $this->likeService->find($id,$user_id);
        $this->likeService->unlike($unLike[0]);
        return redirect()->route('music.play',['id'=>$id]);
    }
}
