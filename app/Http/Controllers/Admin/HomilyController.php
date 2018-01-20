<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Homily;
use Carbon\Carbon;

class HomilyController extends Controller
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
        $homilies = Homily::latest()->paginate(12);
        return view('admin.homily.index', compact('homilies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homily.create');
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
            'title' => 'required|max:50|unique:homilies',
            'published_at' => 'required|date',
            'body' => 'required'
        ]);

        $homily = new Homily;
        $homily->title = request('title');
        $homily->slug = str_slug(request('title'), '-');
        $homily->published_at = request('published_at');
        $homily->body = request('body');
        // $homily->admin_id = auth()->id();
        $homily->save();

        return redirect(route('homily.index'))->with('message','Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $homily = Homily::where('slug', '=', $slug)->firstOrFail();

        return view('admin.homily.show', compact('homily'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $homily = Homily::where('slug', '=', $slug)->firstOrFail();

        return view('admin.homily.edit', compact('homily'));
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
            'title' => 'required|max:50|',//unique:homilies
            'published_at' => 'required|date',
            'body' => 'required'
        ]);

        $homily = Homily::where('slug', '=', $slug)->firstOrFail();
        $homily->title = request('title');
        $homily->slug = str_slug(request('title'), '-');
        $homily->body = request('body');
        $homily->published_at = request('published_at');
        // $homily->admin_id = auth()->id();
        $homily->save();

        return redirect(route('homily.index'))->with('message','Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Homily::where('id',$id)->delete();

        return redirect()->back();
    }
}
