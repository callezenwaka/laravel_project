<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homily;
use Carbon\Carbon;

class HomilyController extends Controller
{
    public function homily()
    {
    	$homilies = Homily::latest('published_at')
            ->published()
            ->filter(request(['month', 'year']))
            ->get();
        
        //$archives = Homily::archives();

        return view('homilies.homily', compact('homilies'));
    }

    public function index()
    {
        $homilies = Homily::latest()->get();
        return view('admin.homilies.index', compact('homilies'));
    }

    public function create()
    {
    	return view('admin.homilies.create');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|unique:homilies',
    		'body' => 'required'
    	]);

    	$homily = new Homily;
        $homily->title = request('title');
        $homily->slug = str_slug(request('title'), '-');
        $homily->body = request('body');
        $homily->user_id = auth()->id();
    	$homily->save();

    	return redirect('admin/homilies');
    }

    public function edit($slug)
    {
    	$homily = Homily::where('slug', '=', $slug)->firstOrFail();

    	return view('admin.homilies.edit', compact('homily'));
    }

    public function update(Request $request, $slug)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|',//unique:homilies
    		'body' => 'required'
    	]);

    	$homily = Homily::where('slug', '=', $slug)->firstOrFail();
        $homily->title = request('title');
        $homily->slug = str_slug(request('title'), '-');
        $homily->body = request('body');
        $homily->user_id = auth()->id();
    	$homily->save();

    	return redirect('admin/homilies');
    }

    public function show($slug)
    {
        $homily = homily::where('slug', '=', $slug)->firstOrFail();

        return view('homilies.show', compact('homily'));
    }
}
