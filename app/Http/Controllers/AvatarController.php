<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use App\Avatar;

class AvatarController extends Controller
{
    public function create()
    {
    	return view('admin.images.create');
    }

    public function store(Request $request)
    {
        
        $this->validate(request(), [

            'image' => 'required|image|nullable',
            'title' => 'required|max:21|unique:avatars',
            'description' => 'required'

        ]);

        if($request->hasFile('image'))
        {
            $avatar = $request->file('image');
            $OriginalFile = $avatar->getClientOriginalName();
            $OriginalName = pathinfo($OriginalFile, PATHINFO_FILENAME);
            $filename = $OriginalName.time() .'.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(800, 400)
            ->save(public_path('/uploads/avatars/' . $filename));

            /*Image::make($avatar)->resize(800, 400, function ($constraint) {
 			    $constraint->aspectRatio();

                $constraint->upsize();

				})->save(public_path('/uploads/avatars/' . $filename));
            */
        }
        
        
        $avatar = new Avatar;
        $avatar->image = $filename;
        $avatar->title = request('title');
        $avatar->description = request('description');
        $avatar->save();
        
        
        return redirect('admin/images');
    }

    public function show(Avatar $avatar)
    {
        //dd($avatar);
        return view('avatars.show',compact('avatar'));
    }

    public function indexAdmin()
    {
    	// dd($image);
        return view('admin.images.index', ['avatars' => Avatar::latest()->get()]);

    }

    

    public function edit($id)
    {
        // dd($image);
        return view('admin.images.edit', ['avatar' => Avatar::where('id',$id)->first()]);

    }

    public function update(Request $request, $id)
    {
        // dd($image);
        $image = Avatar::where('id',$id)->first();
        $this->validate(request(), [

            'image' => 'required|image|nullable',
            'title' => 'required|max:21',
            'description' => 'required|max:21'

        ]);

        if($request->hasFile('image'))
        {
            $avatar = $request->file('image');
            $OriginalFile = $avatar->getClientOriginalName();
            $OriginalName = pathinfo($OriginalFile, PATHINFO_FILENAME);
            $filename = $OriginalName.time() .'.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(650, 300)->save(public_path('/uploads/avatars/' . $filename));
            
        }
        else{
            $filename = 'defaul_image.jpg';
        }

       
        $image->image = $filename;
        $image->title = request('title');
        $image->description = request('description');
        $image->save();
        
        
        return redirect('admin/images');//->back();

    }
}
