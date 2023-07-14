<?php
namespace App\Repositories;

use App\Models\Comment;
use App\Models\Post;

class CommentRepository
{
    /**
     * Save a comment to the database.
     * 
     * @param 
     */
    public static function store(string $uid, int $parentid, string $content)
    {
        $comment = new Comment();
        $comment->idcomment = rand(100000000,999999999);
        $comment->authorID = $uid;
        $comment->parentID = $parentid;
        $comment->text = $content;
        $comment->create_time = date('Y-m-d H:i:s', time());
        $comment->update_time = null;

        if($comment->save())
        {
            return $comment;
        }
        else
        {
            return false;
        }
    }
    /**
     * Get comments of a post from the post's id.
     * 
     * @param int $idpost
     */
    public static function getCommentFromPost(int $idpost)
    {
        $comments = Comment::where('parentID', $idpost)
        ->orderBy('create_time')
        ->get();
        return $comments;
    }
}