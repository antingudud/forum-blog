<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\RemovePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostRepository;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    const POST_CREATE_SUCCESS = [
        'status' => true,
        'description' => 'SUCCESS',
        'message' => 'Post created successfully.'
    ];
    const POST_CREATE_FAIL = [
        'status' => false,
        'description' => 'FAIL',
        'message' => 'Failed to create post.'
    ];
    const POST_UPDATE_SUCCESS = [
        'status' => true,
        'description' => 'SUCCESS',
        'message' => 'Post updated successfully.'
    ];
    const POST_UPDATE_FAIL = [
        'status' => false,
        'description' => 'FAIL',
        'message' => 'Failed to update post.'
    ];
    const POST_DELETE_SUCCESS = [
        'status' => true,
        'description' => 'SUCCESS',
        'message' => 'Post deleted.'
    ];
    const POST_NOT_FOUND = [
        'status' => false,
        'description' => 'NOT_FOUND',
        'message' => 'Post not found.'
    ];
    const POST_BAD_REQUEST = [
        'status' => false,
        'description' => 'BAD_REQUEST',
        'message' => 'Incomplete or wrong request.'
    ];
    const NO_CONFIRMATION = [
        'status' => false,
        'description' => 'UNCONFIRMED',
        'message' => 'No confirmation to alter post.'
    ];
    const UNAUTHORIZED = [
        'status' => false,
        'description' => 'NO_PERMISSION',
        'message' => 'Unauthorized.'
    ];

    /**
     * Get post from url.
     */
    public function get(Request $request, $url)
    {
        $postOwnerIs = false;
        try
        {
        $post = PostRepository::getByUrl($url);
        }
        catch (ModelNotFoundException $e)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }
        catch (NotFoundHttpException $e)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }

        if(auth()->check())
        {
            if($post->authorid === $request->user()->UID)
            {
                $postOwnerIs = true;
            }
        }
        
        return response()->json([
            'status' => true,
            'post' => $post,
            'postOwnerIs' => $postOwnerIs
        ], 200);
    }

    /**
     * Display a listing of the resource sorted by newest.
     * Without the post's content.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $posts = PostRepository::getRecentListPaginatedByUrl(10);

        return $posts;
    }

    /**
     * Display a list view of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Post::selectRaw("DATE_FORMAT(create_time, '%m/%d/%Y') as date, title, url")
        ->get();
        return view('posts.index')
        ->with('articleList', $list);
    }

    /**
     * Display post from url.
     */
    public function show($url, Request $request)
    {
        $postOwnerIs = false;

        $post = PostRepository::getByUrl($url);

        if(auth()->check())
        {
            if($post->authorID === $request->user()->UID)
            {
                $postOwnerIs = true;
            }
        }
        
        return view('posts.index', [
            'post' => $post,
            'isOwner' => $postOwnerIs
        ]);
    }

    /**
     * Show edit post form
     */
    public function edit($url)
    {
        $post = Post::where('url', '=', $url)
        ->first();
        return view('posts.edit')
        ->with('post', $post);
    }

    /**
     * Show create post form
     */
    public function create()
    {
        // Auth check

        return view('posts.create');
    }

    /**
     * Update the post
     * 
     * @param \Illuminate\Http\UpdatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $url)
    {
        if(!$url)
        {
            return response()->json(self::POST_BAD_REQUEST, 422);
        }
        
        $validated = $request->validated();

        try
        {
            $post = PostRepository::getByUrl($url);
        }
        catch (ModelNotFoundException $e)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }
        catch (NotFoundHttpException $e)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }

        if(!$post)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        if($post->save())
        {
            return response()->json(self::POST_UPDATE_SUCCESS, 201);
        }
        else
        {
            return response()->json(self::POST_UPDATE_FAIL);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $validated = $request->validated();

        if($post = PostRepository::create(auth()->user()->UID, $validated['title'], $validated['content']))
        {
            $succMsg = self::POST_CREATE_SUCCESS;
            $succMsg['post'] = $post;

            return response()->json($succMsg, 201);
        }
        else
        {
            $errMsg = self::POST_CREATE_FAIL;
            $errMsg['post'] = $post;

            return response()->json($errMsg, 400);
        }
    }

    /**
     * Delete the post from database
     * 
     * @param int $request->id
     */
    public function remove(RemovePostRequest $request)
    {
        $validated = $request->validated();
        $id = $validated['id'];

        try
        {
            $authorID = PostRepository::getUIDById($id);
        }
        catch (ModelNotFoundException $e)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }
        catch (NotFoundHttpException $e)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }

        if(!$authorID)
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }

        if($authorID !== auth()->user()->UID)
        {
            return response()->json(self::UNAUTHORIZED, 403);
        }

        if($request->confirmation != true)
        {
            return response()->json(self::NO_CONFIRMATION, 422);
        }

        if(!Post::destroy($id))
        {
            return response()->json(self::POST_NOT_FOUND, 404);
        }
        return response()->json(self::POST_DELETE_SUCCESS, 200);
    }
}
