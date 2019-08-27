<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function setting()
    {
        return Setting::first();
    }

    public function index()
    {
        $setting = $this->setting();

        return view('index', compact('setting'));
    }

    public function blog()
    {
        $setting = $this->setting();
        $posts = Post::where('status', 1)->orderBy('published_at', 'DESC')->paginate(4);
        return view('blog', compact('setting', 'posts'));
    }

    public function show($slug)
    {
        $setting = $this->setting();
        $post = Post::where('slug', $slug)->first();
        return view('show', compact('setting', 'post'));
    }

    public function comment(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'body' => 'required|min:5'
        ]);

        $post = Post::where('slug', $slug)->first();

        $request['post_id'] = $post->id;
        $request['status'] = 0;
        Comment::create($request->all());

        return redirect()->back();
    }
}
