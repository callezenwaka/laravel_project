<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AssistChaplain;
use Image;
use Carbon\Carbon;

class AssistChaplainController extends Controller
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
        $assistChaplains = AssistChaplain::paginate(12);

        return view('admin.assistChaplain.index',compact('assistChaplains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assistChaplain.create');
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
            // 'image' => 'image|nullable',
            'body' => 'required',
            'd_o_b' => 'required|date',
            'ordained' => 'required|date',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:assist_chaplains',
            'start' => 'required|date',
            'end' => 'date|nullable',

        ]);

        
        $assistChaplain = new AssistChaplain;
        $assistChaplain->title = request('title');
        $assistChaplain->first_name = request('first_name');
        $assistChaplain->last_name = request('last_name');
        $assistChaplain->slug = str_slug(request('first_name')." ".request('last_name'),'-');
        $assistChaplain->image = 'default.jpg';
        $assistChaplain->bio = request('body');
        $assistChaplain->d_o_b = request('d_o_b');
        $assistChaplain->ordained = request('ordained');
        $assistChaplain->phone = request('phone');
        $assistChaplain->email = request('email');
        $assistChaplain->start = request('start');
        $assistChaplain->end = request('end');
        $assistChaplain->save();

        return redirect(route('assistChaplain.index'))->with('message','Saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $assistChaplain = AssistChaplain::where('slug', '=', $slug)->firstOrFail();
        return view('admin.assistChaplain.show', compact('assistChaplain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $assistChaplain = AssistChaplain::where('slug', '=', $slug)->firstOrFail();
        return view('admin.assistChaplain.edit', compact('assistChaplain'));
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
        $assistChaplain = AssistChaplain::where('slug', '=', $slug)->firstOrFail();

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

        $directory = 'public/uploads/assist';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $OriginalFile = $file->getClientOriginalName();
            $OriginalName = pathinfo($assistChaplain->slug, PATHINFO_FILENAME);
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
        $previous = $directory.'/'.$assistChaplain->image;
        //Remove old profile picture
        if($previous != $directory.'/'.'default.jpg'){
            Storage::delete($previous);
        }

        //$user->image = $filename;
        //$user->image_thumb = $full_path_thumb;
       
        $assistChaplain->title = $request->input('title');
        $assistChaplain->first_name = $request->input('first_name');
        $assistChaplain->last_name = $request->input('last_name');
        $assistChaplain->slug = str_slug($request->input('first_name')." ".$request->input('last_name'),'-');
        $assistChaplain->image = $filename;
        $assistChaplain->bio = request('body');
        $assistChaplain->d_o_b = request('d_o_b');
        $assistChaplain->ordained = request('ordained');
        $assistChaplain->phone = request('phone');
        $assistChaplain->email = request('email');
        $assistChaplain->start = request('start');
        $assistChaplain->end = request('end');
        $assistChaplain->save();

        return redirect(route('assistChaplain.index'))->with('message','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AssistChaplain::where('id',$id)->delete();

        return redirect(route('assistChaplain.index'))->with('message','Profile deleted successfully.');
    }
}
