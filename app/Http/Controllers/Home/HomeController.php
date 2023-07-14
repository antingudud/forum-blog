<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        $lists = [
            [
                'date' => '04/02/2023',
                'link' => '#',
                'title' => 'README.md'
            ]
        ];
        $lists = Post::selectRaw("DATE_FORMAT(create_time, '%m/%d/%Y') as date, title, url")
        ->where('title', 'README.md')
        ->orderBy('create_time', 'desc')
        ->get();
        $content = Post::select(["title", "content"])
        ->get();
        return view('home.main')
        ->with('pinned', $lists)
        ->with('content', $content);
    }
}
