<?php


namespace App\Http\Repositories;


use App\Comment;

class CommentRepository
{
    protected $comments;

    public function __construct(Comment $comment)
    {
        $this->comments = $comment;
    }

    public function save($comment)
    {
        $comment->save();
    }

    public function getAll()
    {
        return $this->comments->all();
    }

    public function getCommentOfSong($song_id)
    {
        return $this->comments->where('song_id', $song_id)->get();
    }

}
