<?php

namespace App\Repositories;

use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostRepository
{
    private $post;

    /**
     * Post
     * 
     * @param Post $post
     */
    // public function __construct(Post $post)
    // {
    //     $this->post = $post;
    // }

    /**
     * Create post and save it to the database
     * 
     * @return Post
     */
    public static function create(string $UID, string $title, string $content)
    {
        $url = rand(1000,9999) . Str::slug($title);
        $post = new Post();
        $post->idpost = rand(100000000,999999999);
        $post->authorid = $UID;
        $post->title = $title;
        $post->content = $content;
        $post->url = $url;
        $post->save();
        return $post;
    }

    public static function checkIfPostByUrl(string $url)
    {
        return Post::where('url', $url)->exists();
    }

    /**
     * Get a post by the id
     * Throw ModelNotFoundException if not found.
     * 
     * @param int $id
     * @return Post
     */
    public static function getById(int $id)
    {
        $post = Post::where('idpost', '=', $id)->firstOrFail();
        return $post;
    }

    /**
     * Get a post by the url
     * Throw ModelNotFoundException if not found.
     * 
     * @param string $url
     * @return Post
     */
    public static function getByUrl(String $url)
    {
        $post = Post::where('url', '=', $url)->firstOrFail();
        return $post;
    }

    /**
     * Get paginated posts sorted by newest
     * 
     * @param int $pagination Paginated by how much
     * @return PostCollection
     */
    public static function getRecentListPaginatedByUrl(int $pagination)
    {
        $posts = Post::select("idpost", "authorID", "user.username", "title", "url", "post.create_time", "post.update_time")
        ->join('user', 'post.authorID', '=', 'user.UID')
        ->orderByDesc('post.create_time')
        ->paginate($pagination);

        return new PostCollection($posts);
    }

    /**
     * Get the id of the post by the post's url.
     * Throw ModelNotFoundException if not found.
     * 
     * @param string $url
     * @return string
     */
    public static function getIdByUrl(string $url)
    {
        $post = Post::select('idpost')
        ->where('url', '=', $url)
        ->firstOrFail();

        return $post->idpost;
    }

    /**
     * Get the UID of the post's author using the post's ID.
     * Throw ModelNotFoundException if not found.
     * 
     * @param int $id
     * @return string $UID
     */
    public static function getUIDById(int $id)
    {
        $post = Post::select('authorid')
        ->where('idpost', '=', $id)
        ->firstOrFail();
        return $post->authorid;
    }

    /**
     * Get the UID of the post's author using the post's url.
     * Throw ModelNotFoundException if not found.
     * 
     * @return string $UID
     */
    public static function getUIDByUrl(string $url)
    {
        $post = Post::select('authorid')
        ->where('url', '=', $url)
        ->firstOrFail();
        return $post->authorid;
    }
}