<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $comments = Comment::with('post')->paginate(10);

        $status = $request->get('status');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        if ($status) {
            $comments = Comment::with('post')
                ->where('status')
                ->paginate(10);
        } else {
            $comments = Comment::with('post')
                ->paginate(10);
        }

        $filterKeyword = $request->get('keyword');

        if ($status) {
            $comments = Comment::with('post')
                ->where('name', "LIKE", "%$keyword%")
                ->where('status', $status)
                ->paginate(10);
        } else {
            $comments = Comment::with('post')
                ->where("name", "LIKE", "%$keyword%")
                ->paginate(10);
        }

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::findOrFail($id);

        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('admin.comments.edit', compact('comment'));
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
        $request->validate([
            'status' => 'required'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('admin.comments.index')
            ->with('status', 'Comments succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = \App\Comment::findOrFail($id);

        $comment->delete();

        return redirect()->route('admin.comments.index')
            ->with('status', 'Comment successfully moved to trash');
    }

    public function trash()
    {
        $deleted_comment = \App\Comment::onlyTrashed()->paginate(10);

        return view('admin.comments.trash', ['comments' => $deleted_comment]);
    }

    public function restore($id)
    {
        $comment = \App\Comment::withTrashed()->findOrFail($id);

        if ($comment->trashed()) {
            $comment->restore();
        } else {
            return redirect()->route('admin.comments.index')
                ->with('status', 'Comment is not in trash');
        }

        return redirect()->route('admin.comments.index')
            ->with('status', 'Comment successfully restored');
    }

    public function deletePermanent($id)
    {
        $comment = \App\Comment::withTrashed()->findOrFail($id);

        if (!$comment->trashed()) {
            return redirect()->route('admin.comments.index')
                ->with('status', 'Can not delete permanent active comment');
        } else {
            $comment->forceDelete();

            return redirect()->route('admin.comments.index')
                ->with('status', 'Comment permanently deleted');
        }
    }
}
