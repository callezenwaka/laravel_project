<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Society;
use Carbon\Carbon;

class SocietyController extends Controller
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
        $societies = Society::latest()->paginate(12);

        return view('admin.society.index',compact('societies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.society.create');
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
            'name' => 'required',
            'logo' => 'image|nullable',
            'body' => 'required',
            'phone' => 'required|min:11',
            'email' => 'required|email|unique:societies',
            'start' => 'required|date',
            'end' => 'date|nullable',

        ]);
       
        $society = new Society;
        $society->name = request('name');
        $society->logo = request('logo');
        $society->body = request('body');
        $society->slug = str_slug(request('name'),'-');
        $society->phone = request('phone');
        $society->email = request('email');
        $society->start = request('start');
        $society->end = request('end');
        $society->save();

        return redirect(route('society.index'))->with('message','Updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $society = Society::where('slug', '=', $slug)->firstOrFail();
        return view('admin.society.show', compact('society'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $society = Society::where('slug', '=', $slug)->firstOrFail();
        return view('admin.society.edit', compact('society'));
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
        $this->validate(request(), [
            'name' => 'required',
            'logo' => 'image|nullable',
            'body' => 'required',
            'phone' => 'required|min:11',
            'email' => 'required|email',
            'start' => 'required|date',
            'end' => 'date|nullable',

        ]);
       
        $society = Society::where('slug', '=', $slug)->firstOrFail();
        $society->name = request('name');
        $society->logo = request('logo');
        $society->body = request('body');
        $society->slug = str_slug(request('name'),'-');
        $society->phone = request('phone');
        $society->email = request('email');
        $society->start = request('start');
        $society->end = request('end');
        $society->save();

        return redirect(route('society.index'))->with('message','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Society::where('id',$id)->delete();

        return redirect(route('society.index'))->with('message','Profile deleted successfully.');
    }
}
