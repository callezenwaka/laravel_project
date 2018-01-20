<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    
	public function blog()
    {
    	return view('blog.blog', ['blogs' => Blog::latest()->take(5)->get()]);
    }

	public function index()
    {
    	return view('admin.blogs.index', ['blogs' => Blog::latest()->get()]);
    }

    public function create()
    {
    	return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|unique:blogs',
    		'body' => 'required'
    	]);

    	$blog = new Blog;
    	$blog->title = request('title');
    	$blog->body = request('body');
    	$blog->save();

    	return redirect('admin/blogs');
    }

    public function show(Blog $blog)
    {
    	return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
    	$blog = Blog::where('id', $id)->first();

    	return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|',//unique:blogs
    		'body' => 'required'
    	]);

    	$blog = Blog::where('id', $id)->first();
    	$blog->title = request('title');
    	$blog->body = request('body');//dd($blog);
    	$blog->save();

    	return redirect('admin/blogs');
    }
}
