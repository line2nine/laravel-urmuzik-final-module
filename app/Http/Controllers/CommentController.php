<?php

namespace App\Http\Controllers;

use App\Http\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentsService;

    public function __construct(CommentService $commentService)
    {
        $this->commentsService = $commentService;
    }

    public function addNewCommentSong(Request $request, $song_id)
    {
        $this->commentsService->addNewCommentSong($request, $song_id);
        $comment = $this->commentsService->getCommentOfSong($song_id);

//        return back();
    return response()->json(
        [
            'status' => 'success',
            'comment' => $comment
        ]
    );
    }

}
