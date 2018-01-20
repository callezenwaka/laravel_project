<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function blog()
    {
        //$blogs = Blog::paginate(3);
        
        $blogs = Blog::latest()->take(6)->get();

        return view('user.blog.blog', compact('blogs'));
    }

    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        
        //$archives = Post::archives();

        return view('user.blog.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->firstOrFail();
        return view('user.blog.show', compact('blog'));
    }
}
