<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Executive;
use Carbon\Carbon;

class ExecutiveController extends Controller
{
    public function executive()
    {
        $executives = Executive::latest()
            ->filter(request(['year']))
            ->get();
        
        //$archives = Homily::archives();

        return view('user.executive.executive', compact('executives'));
    }

    public function index()
    {
        $past_excos = Executive::past_excos();
        
        //$archives = Post::archives();

        return view('user.executive.index', compact('past_excos'));
    }

    public function show($slug)
    {
        $executive = Executive::where('slug', '=', $slug)->firstOrFail();
        return view('user.executive.show', compact('executive'));
    }
}
