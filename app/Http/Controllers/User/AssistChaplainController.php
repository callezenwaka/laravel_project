<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\AssistChaplain;
use Carbon\Carbon;

class AssistChaplainController extends Controller
{
    public function assistChaplain()
    {
        $assistChaplains = AssistChaplain::latest()
            ->filter(request(['year']))
            ->get();
        
        //$archives = Homily::archives();

        return view('user.assistChaplain.assistChaplain', compact('assistChaplains'));
    }

    public function index()
    {
        $assistChaplains = AssistChaplain::latest()->get();
        
        //$archives = Post::archives();

        return view('user.assistChaplain.index', compact('assistChaplains'));
    }

    public function show($slug)
    {
        $assistChaplain = AssistChaplain::where('slug', '=', $slug)->firstOrFail();
        return view('user.assistChaplain.show', compact('assistChaplain'));
    }
}
