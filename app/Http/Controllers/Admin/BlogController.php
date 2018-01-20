<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(8);

        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:50|unique:blogs',
            'image' => 'image',
            'body' => 'required'
        ]);

        $blog = new Blog;
        $blog->title = request('title');
        $blog->slug = str_slug(request('title'), '-');
        $blog->image = request('image');
        $blog->body = request('body');
        $blog->admin_id = auth()->id();
        $blog->save();

        return redirect(route('blog.index'))->with('message','Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->firstOrFail();

        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->firstOrFail();

        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate(request(), [
            'title' => 'required|max:50|',//unique:blogs
            'image' => 'image',
            'body' => 'required'
        ]);

        $blog = Blog::where('slug', '=', $slug)->firstOrFail();
        $blog->title = request('title');
        $blog->slug = str_slug(request('title'), '-');
        $blog->image = request('image');
        $blog->body = request('body');
        $blog->admin_id = auth()->id();
        $blog->save();

        return redirect(route('blog.index'))->with('message','Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::where('id',$id)->delete();

        return redirect(route('blog.index'))->with('message','Blog deleted successfully.');
    }
}
