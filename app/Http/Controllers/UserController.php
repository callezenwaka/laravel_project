<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use File;
use Image;
//use Storage;

class UserController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except' => ['']]);
    // }

    public function index()
    {
        $users = User::latest()->get();

        return view('admin.user.index', compact('users'));
    }

    public function show($slug)
    {
        $user = Auth::user();

        return view('user.show', compact('user'));
    }

    public function edit($slug)
    {

        $user = Auth::user();

        return view('user.edit_user', compact('user'));

    }

    public function update(Request $request, $slug)
    {
        //dd($request->all());
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

        $success = array('message'=>'Profile updated successfully.');
        return redirect(route('user.show_user',Auth::user()->slug));
    }

    public function edit_image($slug)
    {
        $user = Auth::user();
        
        return view('users.editImage', compact('user'));

    }

    public function update_image(Request $request, $slug)
    {
        $user = Auth::user();
        $this->validate(request(), [
            'image' => 'image|nullable',
        ]);

        //$directory = 'public/uploads/avatars';

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $OriginalFile = $file->getClientOriginalName();
            // $OriginalName = pathinfo($OriginalFile, PATHINFO_FILENAME);
            $OriginalName = pathinfo($user->slug, PATHINFO_FILENAME);
            $filename = $OriginalName.time() .'.' . $file->getClientOriginalExtension();
             $filename_thumb = $OriginalName.'_thumb.'.time() .'.' . $file->getClientOriginalExtension();
            $directory = 'public/uploads/avatars';
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
            //dd($full_path);
        }
        else{
            $filename = 'default.jpg';
        }
        //$url = Storage::url($full_path);
        $previous = $directory.'/'.$user->image;
        //dd($previous);
        if($previous != $directory.'/'.'default.jpg'){
            Storage::delete($previous);
        }

        $user->image = $filename;
        //$user->image_thumb = $full_path_thumb;
        $user->save();
        
        //eturn view('users.show', compact('user'));
        return redirect(route('user.show_user',Auth::user()->slug));

    }
}

// if ($request->hasFile('photo')) {
//             $image      = $request->file('photo');
//             $fileName   = time() . '.' . $image->getClientOriginalExtension();

//             $img = Image::make($image->getRealPath());
//             $img->resize(120, 120, function ($constraint) {
//                 $constraint->aspectRatio();                 
//             });

//             $img->stream(); // <-- Key point

//             //dd();
//             Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');
// }