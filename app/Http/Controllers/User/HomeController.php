<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\Post;
use App\Model\User\Blog;
use App\Model\User\Chaplain;
use App\Model\User\AssistChaplain;
use App\Model\User\Executive;
use App\Model\User\Society;
use App\Model\User\Homily;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {        
        $archives = Homily::archives();
        $posts = Post::latest()->take(3)->get();
        $chaplain = Chaplain::latest()->take(1)->get();
        $single_assist_chaplain = AssistChaplain::latest()->take(1)->get();
        $chaps = Chaplain::chaps();
        $assists = AssistChaplain::assists();
        $excos = Executive::excos();
        $orgs = Society::orgs();
        
        //dd($chaplain);
        return view('user.index', compact('posts','archives','excos','orgs','chaps','assists','chaplain','single_assist_chaplain'));
    }

    public function about()
    {
    	return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function anthem()
    {
        return view('user.anthem');
    }

    public function prayer()
    {
        return view('user.prayer');
    }

    public function nfcs()
    {
        return view('user.nfcs');
    }
}
