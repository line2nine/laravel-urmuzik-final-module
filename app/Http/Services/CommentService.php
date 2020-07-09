<?php


namespace App\Http\Services;


use App\Comment;
use App\Http\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    protected $commentsRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentsRepository = $commentRepository;
    }

    public function addNewCommentSong($request, $song_id)
    {
        $comment = new Comment();
        $comment->desc = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->song_id = $song_id;

        $this->commentsRepository->save($comment);

        return true;

    }

    public function getAll()
    {
        return $this->getAll();
    }

    public function getCommentOfSong($song_id)
    {
        return $this->commentsRepository->getCommentOfSong($song_id);
    }
}
