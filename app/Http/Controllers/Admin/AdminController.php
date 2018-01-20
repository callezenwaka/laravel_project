<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use Carbon\Carbon;
use Auth;
use Image;

class AdminController extends Controller
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
        $users = Admin::paginate(12);
        //$users = Admin::latest()->get();

        return view('admin.admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image', 
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric|min:11',
            'status' => 'required',
        ]);
        //return $request->all();

        $request['password'] = bcrypt($request->password);

        $user = new Admin;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->slug = str_slug($request->input('first_name')." ".$request->input('last_name'),'-');
        $user->image = $request->input('image');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->status = $request->input('status');
        $user->save();

        $user->roles()->sync($request->role);

        return redirect(route('admin.index'))->with('message','Profile updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $roles = Role::all();
        $user = Admin::where('slug', '=', $slug)->firstOrFail();
        return view('admin.admin.show', compact('user','roles'));
        // return 'yes';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $roles = Role::all();
        $user = Admin::where('slug', '=', $slug)->firstOrFail();
        return view('admin.admin.edit', compact('user','roles'));
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
        $this->validate($request, [

            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image', 
            'email' => 'required|email|string',
            // 'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric|min:11',
        ]);

        // $request['password'] = bcrypt($request->password);
        $request->status? : $request['status']=0;

        $user = Admin::where('slug', '=', $slug)->firstOrFail();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->slug = str_slug($request->input('first_name')." ".$request->input('last_name'),'-');
        $user->image = $request->input('image');
        $user->email = $request->input('email');
        // $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->status = $request->input('status');
        $user->save();
        $user->roles()->sync($request->role);

        return redirect(route('admin.index'))->with('message','Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id',$id)->delete();

        return redirect(route('admin.index'))->with('message','Profile deleted successfully.');
    }
}
