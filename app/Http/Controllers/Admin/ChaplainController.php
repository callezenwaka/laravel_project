<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Chaplain;
use Image;
use Carbon\Carbon;

class ChaplainController extends Controller
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
        $chaplains = Chaplain::latest()->paginate(12);

        return view('admin.chaplain.index',compact('chaplains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chaplain.create');
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
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image|nullable',
            'body' => 'required',
            'd_o_b' => 'required|date',
            'ordained' => 'required|date',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:chaplains',
            'start' => 'required|date',
            'end' => 'date|nullable',

        ]);
       
        $chaplain = new Chaplain;
        $chaplain->title = $request->input('title');
        $chaplain->first_name = $request->input('first_name');
        $chaplain->last_name = $request->input('last_name');
        $chaplain->slug = str_slug($request->input('first_name')." ".$request->input('last_name'),'-');
        $chaplain->image = 'default.jpg';
        $chaplain->phone = request('phone');
        $chaplain->email = request('email');
        $chaplain->bio = request('body');
        $chaplain->d_o_b = request('d_o_b');
        $chaplain->ordained = request('ordained');
        $chaplain->start = request('start');
        $chaplain->end = request('end');
        $chaplain->save();

        return redirect(route('chaplain.index'))->with('message','Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $chaplain = Chaplain::where('slug', '=', $slug)->firstOrFail();
        return view('admin.chaplain.show', compact('chaplain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $chaplain = Chaplain::where('slug', '=', $slug)->firstOrFail();
        return view('admin.chaplain.edit', compact('chaplain'));
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
        $chaplain = Chaplain::where('slug', '=', $slug)->firstOrFail();
        $this->validate(request(), [
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image|nullable',
            'body' => 'required',
            'd_o_b' => 'required|date',
            'ordained' => 'required|date',
            'phone' => 'required|min:11',
            'email' => 'required|email',
            'start' => 'required|date',
            'end' => 'date|nullable',
        ]);

        $directory = 'public/uploads/chaplain';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $OriginalFile = $file->getClientOriginalName();
            $OriginalName = pathinfo($chaplain->slug, PATHINFO_FILENAME);
            $filename = $OriginalName.time() .'.' . $file->getClientOriginalExtension();
            $filename_thumb = $OriginalName.'_thumb.'.time() .'.' . $file->getClientOriginalExtension();
            //Check if directory exists
            Storage::makeDirectory($directory);
            //Create image
            $image = Image::make($file)->resize(300, 300);
            //Create thumbnail
            $image_thumb = $image->fit(200);
            //Generate full paths
            $full_path = $directory.'/'.$filename;
            $full_path_thumb = $directory.'/'.$filename_thumb;
            //Put images into storage
            Storage::put($full_path, $image->stream());
            //Storage::put($full_path_thumb, $image_thumb->stream()); 
        }
        else{
            //Assign default image to the user
            $filename = 'default.jpg';
        }
        //Find old profile picture
        $previous = $directory.'/'.$chaplain->image;
        //Remove old profile picture
        if($previous != $directory.'/'.'default.jpg'){
            Storage::delete($previous);
        }
       
        $chaplain->title = request('title');
        $chaplain->first_name = request('first_name');
        $chaplain->last_name = request('last_name');
        $chaplain->slug = str_slug(request('first_name')." ".request('last_name'),'-');
        $chaplain->image = $filename;
        $chaplain->bio = request('body');
        $chaplain->d_o_b = request('d_o_b');
        $chaplain->ordained = request('ordained');
        $chaplain->phone = request('phone');
        $chaplain->email = request('email');
        $chaplain->start = request('start');
        $chaplain->end = request('end');
        $chaplain->save();

        return redirect(route('chaplain.index'))->with('message','Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chaplain::where('id',$id)->delete();

        return redirect(route('chaplain.index'))->with('message','Profile deleted successfully.');
    }
}
