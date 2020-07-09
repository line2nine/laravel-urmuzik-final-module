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

}
