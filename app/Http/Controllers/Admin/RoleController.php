<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use Carbon\Carbon;

class RoleController extends Controller
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
        $roles = Role::paginate(12);
        //$users = Admin::latest()->get();

        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
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

            'name' => 'required|unique:roles',
        ]);
        
        $role = new Role;
        $role->name = $request->input('name');
        $role->slug = str_slug($request->input('name'),'-');
        $role->save();
        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'))->with('message','permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $role = Role::where('slug','=',$slug)->firstOrFail();
        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $permissions = Permission::all();
        $role = Role::where('slug','=',$slug)->firstOrFail();
        return view('admin.role.edit', compact('role','permissions'));
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

            'name' => 'required',
        ]);
        //$role = Role::where('id',$id)->first();
        $role = Role::where('slug','=',$slug)->firstOrFail();
        $role->name = $request->input('name');
        $role->slug = str_slug($request->input('name'),'-');
        $role->save();
        $role->permissions()->sync($request->permission);

        return redirect(route('role.index'))->with('message','permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();

        return redirect(route('role.index'))->with('message','Role deleted successfully.');
    }
}
