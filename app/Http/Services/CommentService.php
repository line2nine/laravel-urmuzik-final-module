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

    public function deleteComment($id)
    {
        $comment = $this->commentsRepository->find($id);
        if (Auth::user()->id === $comment->user_id) {
            $this->commentsRepository->delete($comment);

            return true;
        } else {
            return false;
        }
    }

    public function deleteAllComment($song_id) {
        $comments = $this->commentsRepository->getCommentOfSong($song_id);

        foreach ($comments as $comment) {
            if (Auth::user()->id === $comment->song->user_id){
                $this->commentsRepository->delete($comment);
            } else {
                return false;
            }
        }

        return true;
    }
}
