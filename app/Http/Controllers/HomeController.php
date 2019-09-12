<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $posts = \App\Post::orderBy('published_at', 'DESC')->paginate(8);
        $users = \App\User::paginate(8);
        return view('admin.home', compact('posts', 'users'));
    }
}
