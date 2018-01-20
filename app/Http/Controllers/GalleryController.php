<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Carbon\Carbon;
use Image;

class GalleryController extends Controller
{
    public function gallery()
    {
    	return view('galleries.gallery', ['galleries' => Gallery::all()]);
    }

    public function index()
    {
    	return view('admin.galleries.index', ['galleries' => Gallery::all()]);
    }

    public function upload()
    {
    	return view('admin.galleries.upload');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'photo' => 'required|image|unique:galleries',
    		'title' => 'required|max:10',
    	]);

    	if($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $OriginalFile = $photo->getClientOriginalName();
            $OriginalName = pathinfo($OriginalFile, PATHINFO_FILENAME);
            $filename = $OriginalName.time() .'.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(400, 400)
            ->save(public_path('/uploads/galleries/' . $filename));
        }

    	$gallery = new Gallery;
    	$gallery->photo = $filename;
    	$gallery->title = request('title');
    	$gallery->save();

    	return redirect('admin/galleries');
    }

    public function show(Gallery $gallery)
    {
    	return view('galleries.show', compact('gallery'));
    }

    public function download($id)
    {
    	$gallery = Avatar::where('id',$id)->first();
    	$file = $gallery->photo;
    	return Respose::download($file);
    }
}
