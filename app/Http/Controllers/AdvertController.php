<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use App\Advert;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['advert', 'show']]);
    }

    public function advert()
    {
        $adverts = Advert::latest()->get();
        
        //$archives = Advert::archives();

        return view('adverts.advert', compact('adverts'));
    }

    public function index()
    {
    	return view('admin.adverts.index', ['adverts' => advert::latest()->get()]);
    }

    public function create()
    {
    	return view('admin.adverts.create');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|unique:adverts',
    		'body' => 'required'
    	]);

    	$advert = new advert;
        $advert->title = request('title');
        $advert->slug = str_slug(request('title'), '-');
        $advert->body = request('body');
        $advert->user_id = auth()->id();
    	$advert->save();

    	return redirect('admin/adverts');
    }

    /*public function show(advert $advert)
    {
    	return view('adverts.show', compact('advert'));
    }*/

    public function show($slug)
    {
        $advert = Advert::where('slug', '=', $slug)->firstOrFail();
        return view('adverts.show', compact('advert'));
    }

    public function edit($slug)
    {
    	$advert = Advert::where('slug', '=', $slug)->firstOrFail();

    	return view('admin.adverts.edit', compact('advert'));
    }

    public function update(Request $request, $slug)
    {
    	$this->validate(request(), [
    		'title' => 'required|max:50|',//unique:adverts
    		'body' => 'required'
    	]);

    	$advert = Advert::where('slug', '=', $slug)->firstOrFail();
        $advert->title = request('title');
        $advert->slug = str_slug(request('title'), '-');
        $advert->body = request('body');
        $advert->user_id = auth()->id();
    	$advert->save();

    	return redirect('admin/adverts');
    }

}
