<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentController extends Controller
{
    const DEV_NOTICE = "Turn off in production mode.";
    const POST_NOT_FOUND = [
        'status' => false,
        'description' => 'NOT_FOUND',
        'message' => 'Post not found.'
    ];

    /**
     * Get comments of a post
     */
    public function get(ShowCommentRequest $request)
    {
        // TODO: Validation

        $url = $request->validated()['url'];

        $idpost = PostRepository::getIdByUrl($url);
        if(!$idpost)
        {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }
        $comments = CommentRepository::getCommentFromPost($idpost);
        if(count($comments) === 0)
        {
            return response()->json([
                'status' => false,
                'message' => 'Comments not found',
            ], 204);
        }
        return response()->json([
            'status' => true,
            'message' => 'Found',
            'comments' => $comments,
        ], 200);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $url)
    {
        if(!PostRepository::checkIfPostByUrl($url))
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }

        $idpost = PostRepository::getIdByUrl($url);
        if(!$idpost)
        {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $content = $request->content;
        $comment = new Comment();

        $comment = CommentRepository::store(auth()->id(), $idpost, $content);
        
        if(!$comment)
        {
            return response()->json([
                'status' => false,
                'message' => 'Failed to add comment.'
            ], 400);
        }
        return response()->json([
            'status' => true,
            'message' => 'Comment added.',
            'comment' => $comment
        ], 201);
    }

    /**
     * Delete controller
     * 
     * @param \Illuminate\Http\Request  $request
     */
    public function delete(Request $request)
    {
        $idcomment = $request->id;

        if(!$idcomment)
        {
            return response()->json([
                'status' => false,
                'message' => 'No params'
            ], 400);
        }

        if(!$comment = Comment::find($idcomment))
        {
            return response()->json([
                'status' => false,
                'message' => 'Comment not found'
            ], 404);
        }

        if(!($comment->authorID === auth()->user()->UID))
        {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized.'
            ], 403);
        }

        if(!$comment->delete())
        {
            return response()->json([
                'status' => false,
                'message' => 'Something wrong'
            ], 500);
        }
        return response()->json([
            'status' => true,
            'message' => 'Comment deleted'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        // this should be in a repository
        // but do that when its all done
    }
}
