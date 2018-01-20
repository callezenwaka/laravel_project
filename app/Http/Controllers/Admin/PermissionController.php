<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;
use Carbon\Carbon;

class PermissionController extends Controller
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
        $permissions = Permission::paginate(12);
        //$users = Admin::latest()->get();

        return view('admin.permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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

            'name' => 'required|unique:permissions',
            'for' => 'required',
        ]);

        $permission = new Permission;
        $permission->name = $request->input('name');
        $permission->slug = str_slug($request->input('name'),'-');
        $permission->for = $request->input('for');
        $permission->save();

        return redirect(route('permission.index'))->with('message','Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $permission = Permission::where('slug','=',$slug)->firstOrFail();
        return view('admin.permission.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $permission = Permission::where('slug','=',$slug)->firstOrFail();
        return view('admin.permission.edit', compact('permission'));
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
            'for' => 'required',
        ]);

        $permission = Permission::where('slug','=',$slug)->firstOrFail();;
        $permission->name = $request->input('name');
        $permission->slug = str_slug($request->input('name'),'-');
        $permission->for = $request->input('for');
        $permission->save();

        
        return redirect(route('permission.index'))->with('message','Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::where('id',$id)->delete();

        return redirect(route('permission.index'))->with('message','Permission deleted successfully.');
    }
}
