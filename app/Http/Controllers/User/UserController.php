<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\User\User;
use Auth;
use Image;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();

        return view('user.user.show_user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = Auth::user();

        return view('user.user.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'first_name' => 'required',
            'last_name' => 'required', 
            'gender' => 'required',
            'level' => 'required',
            'department' => 'required',
            'faculty' => 'required',
            'street_name' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required|min:11',
            'd_o_b' => 'required|date',
            'bio' => 'required',
            'username' => 'required',
            'email' => 'required',

        ]);

        //$user = User::where('id', $id)->first();//$user = User::find($id)->first();
        $user = Auth::user();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->slug = str_slug($request->input('first_name')." ".$request->input('last_name'),'-');
        $user->gender = $request->input('gender');
        $user->level = $request->input('level');
        $user->department = $request->input('department');
        $user->faculty = $request->input('faculty');
        $user->street_name = $request->input('street_name');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->phone = $request->input('phone');
        $user->d_o_b = $request->input('d_o_b');
        $user->bio = $request->input('bio');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->save();

        return redirect(route('user.show_user',Auth::user()->slug))->with('message','Profile updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_image($slug)
    {
        $user = Auth::user();
        
        return view('user.user.editImage', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_image(Request $request, $slug)
    {
        $user = Auth::user();
        $this->validate(request(), [
            'image' => 'image|nullable',
        ]);

        $directory = 'public/uploads/avatars';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $OriginalFile = $file->getClientOriginalName();
            // $OriginalName = pathinfo($OriginalFile, PATHINFO_FILENAME);
            $OriginalName = pathinfo($user->slug, PATHINFO_FILENAME);
            $filename = $OriginalName.time() .'.' . $file->getClientOriginalExtension();
             $filename_thumb = $OriginalName.'_thumb.'.time() .'.' . $file->getClientOriginalExtension();
            //$directory = 'public/uploads/avatars';
            //Check if directory exists
            Storage::makeDirectory($directory);
            //Create image
            $image = Image::make($file)->resize(300, 300);
            //Create thumbnail
            $image_thumb = $image->fit(200);
            //Generate full paths
            $full_path = $directory.'/'.$filename;
            $full_path_thumb = $directory.'/'.$filename_thumb;

            //$image->save(public_path('/uploads/avatars/'.$filename));
            //$imageSavedUri = $image->dirname.'/'.$image->basename;
            //Put images into storage
            Storage::put($full_path, $image->stream());
            //Storage::put($full_path_thumb, $image_thumb->stream());

            //$imageFile = Storage::putFileAS('public/uploads/avatars/'.$user->id, new File($imageSavedUri),$filename);
            dd($full_path);
        }
        else{
            //Assign default image to the user
            $filename = 'default.jpg';
        }

        //Find old profile picture
        $previous = $directory.'/'.$user->image;
        
        //Remove old profile picture
        if($previous != $directory.'/'.'default.jpg'){
            Storage::delete($previous);
        }

        $user->image = $filename;
        //$user->image_thumb = $full_path_thumb;
        $user->save();
        
        //eturn view('users.show', compact('user'));
         return redirect(route('user.show_user',Auth::user()->slug))->with('message','Profile updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
