<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Chaplain;
use Carbon\Carbon;

class ChaplainController extends Controller
{
    public function chaplain()
    {
        $chaplains = Chaplain::latest()
            ->filter(request(['year']))
            ->get();
        
        //$archives = Homily::archives();

        return view('user.chaplain.chaplain', compact('chaplains'));
    }

    public function index()
    {
        $chaplains = Chaplain::latest()->get();
        
        $chaplains->shift();

        return view('user.chaplain.index', compact('chaplains'));
    }

    public function show($slug)
    {
        $chaplain = Chaplain::where('slug', '=', $slug)->firstOrFail();
        return view('user.chaplain.show', compact('chaplain'));
    }
}
