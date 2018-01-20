<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function post()
    {
        $posts = Post::latest()->take(2)->get();
        return view('user.post.post', compact('posts'));
    }

    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('user.post.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        return view('user.post.show', compact('post'));
    }
}
