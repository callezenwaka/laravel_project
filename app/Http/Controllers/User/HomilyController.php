<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Homily;
use Carbon\Carbon;

class HomilyController extends Controller
{
    public function homily()
    {
    	$homilies = Homily::latest('published_at')
            ->published()
            ->filter(request(['month', 'year']))
            ->get();
        
        //$archives = Homily::archives();

        return view('user.homily.homily', compact('homilies'));
    }

    public function index()
    {
        $homilies = Homily::latest()->paginate(15);
        return view('user.homily.index', compact('homilies'));
    }

    public function show($slug)
    {
        $homily = Homily::where('slug', '=', $slug)->firstOrFail();
        return view('user.homily.show', compact('homily'));
    }
}
