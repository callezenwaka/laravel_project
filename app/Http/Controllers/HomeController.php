<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use App\Post;
use App\Homily;
use Carbon\Carbon;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth',['except' => ['index', 'about', 'contact']]);
    // }
    
    public function index()
    {
    	// $avatar = Avatar::all();
     //    $posts = Post::latest()->take(5)->get();
     //    $navlinks = Homily::navlinks();
     //    //$homilies = Homily::latest()
     //        //->filter(request(['month', 'year']))
     //       //->get();
        
        // $archives = Homily::archives();

     //    return view('news.index', 
     //        compact('avatar','archives','navlinks','posts','homilies'));
        // $posts = Post::latest()->take(5)->get();

        return view('user.index', compact('posts','archives'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    // public function dashboard()
    // {
    //     return view('admin.index');
    // }    
}
