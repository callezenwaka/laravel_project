<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Executive;
use Image;
use Carbon\Carbon;

class ExecutiveController extends Controller
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
        $executives = Executive::latest()->paginate(12);

        return view('admin.executive.index',compact('executives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.executive.create');
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
            'portfolio' => 'required',
            'image' => 'image|nullable',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:executives',
            'start' => 'required|date',
            'end' => 'date|nullable',

        ]);
       
        $executive = new Executive;
        $executive->title = $request->input('title');
        $executive->first_name = $request->input('first_name');
        $executive->last_name = $request->input('last_name');
        $executive->portfolio = $request->input('portfolio');
        $executive->slug = str_slug($request->input('first_name')." ".$request->input('last_name'),'-');
        $executive->image = 'default.jpg';
        $executive->phone = request('phone');
        $executive->email = request('email');
        $executive->start = request('start');
        $executive->end = request('end');
        $executive->save();

        return redirect(route('executive.index'))->with('message','Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $executive = Executive::where('slug', '=', $slug)->firstOrFail();
        return view('admin.executive.show', compact('executive'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $executive = Executive::where('slug', '=', $slug)->firstOrFail();
        return view('admin.executive.edit', compact('executive'));
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
        $executive = Executive::where('slug', '=', $slug)->firstOrFail();
        $this->validate(request(), [
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'portfolio' => 'required',
            'image' => 'image|nullable',
            'phone' => 'required|min:11',
            'email' => 'required|email',
            'start' => 'required|date',
            'end' => 'date|nullable',

        ]);

        $directory = 'public/uploads/executive';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $OriginalFile = $file->getClientOriginalName();
            $OriginalName = pathinfo($executive->slug, PATHINFO_FILENAME);
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
        $previous = $directory.'/'.$executive->image;
        //Remove old profile picture
        if($previous != $directory.'/'.'default.jpg'){
            Storage::delete($previous);
        }
       
        $executive->title = $request->input('title');
        $executive->first_name = $request->input('first_name');
        $executive->last_name = $request->input('last_name');
        $executive->portfolio = $request->input('portfolio');
        $executive->slug = str_slug($request->input('first_name')." ".$request->input('last_name'),'-');
        $executive->image = $filename;
        $executive->phone = Request('phone');
        $executive->email = request('email');
        $executive->start = request('start');
        $executive->end = request('end');
        $executive->save();

        return redirect(route('executive.index'))->with('message','Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Executive::where('id',$id)->delete();

        return redirect(route('executive.index'))->with('message','Profile deleted successfully.');
    }
}

