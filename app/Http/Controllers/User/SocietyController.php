<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Society;
use Carbon\Carbon;

class SocietyController extends Controller
{
    public function society()
    {
        $societies = Society::latest()
            ->filter(request(['year']))
            ->get();
        
        //$archives = Homily::archives();

        return view('user.society.society', compact('societies'));
    }

    public function index()
    {
        $past_orgs = Society::past_orgs();
        
        //$archives = Post::archives();

        return view('user.society.index', compact('past_orgs'));
    }

    public function show($slug)
    {
        $society = Society::where('slug', '=', $slug)->firstOrFail();
        return view('user.society.show', compact('society'));
    }
}
