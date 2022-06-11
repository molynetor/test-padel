<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\BlogPost;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogpost = BlogPost::orderBy('id', 'ASC')->take(3)->get();
        if(Auth::user()->role->name == 'admin'){

            return redirect()->to('/dashboard');
        }
        return view('welcome',compact('blogpost'));
    }
}
