<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        if ($status) {
            $posts = \App\Post::with(['user', 'category'])
            ->where('status')
            ->paginate(10);
        } else {
            $posts = \App\Post::with(['user', 'category'])
            ->paginate(10);
        }

        $filterKeyword = $request->get('keyword');

        if ($status) {
            $posts = \App\Post::with(['user', 'category'])
            ->where('title', "LIKE", "%$keyword%")
            ->where('status', strtoupper($status))
            ->paginate(10);
        } else {
            $posts = \App\Post::with(['user', 'category'])
            ->where("title", "LIKE", "%$keyword%")
            ->paginate(10);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required|string|min:5|unique:posts',
            'body' => 'required|min:20',
            'status' => 'required',
            'published_at' => 'required'
        ]);

        $new_post = new \App\Post;

        $new_post->title = $request->get('title');
        $new_post->body = $request->get('body');
        $new_post->category_id = $request->get('category_id');
        $new_post->published_at = $request->get('published_at');
        $new_post->status = $request->get('status');
        $new_post->slug = \Str::slug($request->get('title'));
        $new_post->user_id = \Auth::user()->id;

        $featured = $request->file('featured');

        if($featured){
            $featured_path = $featured->store('featured', 'public');

            $new_post->featured = $featured_path;
        }

        $new_post->save();

        if ($request->get('status') == 1) {
            return redirect()
                ->route('admin.posts.index')
                ->with('status', 'Posts successfully saved and published');
        } else {
            return redirect()
                ->route('admin.posts.index')
                ->with('status', 'Posts saved as draft');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::findOrFail($id);

        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required|string|min:5|unique:posts,title,' . $id,
            'body' => 'required|min:20',
            'status' => 'required',
            'published_at' => 'required'
        ]);

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->category_id = $request->get('category_id');
        $post->published_at = $request->get('published_at');
        $post->status = $request->get('status');
        $post->slug = \Str::slug($request->get('title'));
        $post->user_id = \Auth::user()->id;

        $new_featured = $request->file('featured');

        if ($new_featured) {
            if ($post->featured && file_exists(storage_path('app/public/' . $post->featured))) {
                \Storage::delete('public/' . $post->featured);
            }

            $new_featured_path = $new_featured->store('featured', 'public');

            $post->featured = $new_featured_path;
        }

        return redirect()->route('admin.posts.index')
            ->with('status', 'Posts succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::findOrFail($id);

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('status', 'Posts successfully moved to trash');
    }

    public function trash()
    {
        $posts = \App\Post::onlyTrashed()->paginate(10);

        return view('admin.posts.trash', ['posts' => $posts]);
    }

    public function restore($id)
    {
        $post = \App\Post::withTrashed()->findOrFail($id);

        if ($post->trashed()) {
            $post->restore();
        } else {
            return redirect()->route('admin.posts.trash')
                ->with('status', 'Post is not in trash');
        }

        return redirect()->route('admin.posts.trash')
            ->with('status', 'Post successfully restored');
    }

    public function deletePermanent($id)
    {
        $post = \App\Post::withTrashed()->findOrFail($id);

        if (!$post->trashed()) {
            return redirect()->route('admin.posts.index')
                ->with('status', 'Post is not in trash!');
        } else {
            $post->forceDelete();

            return redirect()->route('admin.posts.index')
                ->with('status', 'Post permanently deleted!');
        }
    }


}
