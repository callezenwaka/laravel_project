<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{       
    public function __construct()
    {
        $this->middleware('auth',['except' => ['post', 'show']]);
    }

    // public function post()
    // {
    //     $posts = Post::latest()->get();
        
    //     //$archives = Post::archives();

    //     return view('posts.post', compact('posts'));
    // }

    public function index()
    {
    	return view('admin.posts.index', ['posts' => Post::latest()->get()]);
    }

    public function create()
    {
    	return view('admin.posts.create');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|unique:posts',
    		'body' => 'required'
    	]);
        dd($request->all());
    	$post = new Post;
        $post->title = request('title');
        $post->slug = str_slug(request('title'), '-');
        $post->body = request('body');
        $post->user_id = auth()->id();
    	$post->save();

    	return redirect('admin/posts');
    }

    /*public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    }*/

    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        return view('posts.show', compact('post'));
    }

    public function edit($slug)
    {
    	$post = Post::where('slug', '=', $slug)->firstOrFail();

    	return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $slug)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|',//unique:posts
    		'body' => 'required'
    	]);

    	$post = Post::where('slug', '=', $slug)->firstOrFail();
        $post->title = request('title');
        $post->slug = str_slug(request('title'), '-');
        $post->body = request('body');
        $post->user_id = auth()->id();
    	$post->save();

    	return redirect('admin/posts');
    }

}
