<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::paginate(10);

        $filterKeyword = $request->get('name');

        if ($filterKeyword) {
            $categories = Category::where("title", "LIKE", "%$filterKeyword%")->paginate(10);
        }

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|unique:categories'
        ]);

        $title = $request->get('title');

        $new_category = new \App\Category;
        $new_category->title = $title;
        $new_category->slug = str_slug($title, '-');

        $new_category->save();
        return redirect()->route('admin.categories.index')
            ->with('status', 'Kategori berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        return view('admin.categories.edit', compact('categories'));
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
            'title' => 'required|string|min:3|unique:categories,title,' . $id
        ]);

        $request['slug'] = str_slug($request->get('title'), '-');

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('status', 'Kategori berhasil dipindahkan ke trash');
    }

    public function trash()
    {
        $deleted_category = Category::onlyTrashed()->paginate(10);

        return view('admin.categories.trash', ['categories' => $deleted_category]);
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        if ($category->trashed()) {
            $category->restore();
        } else {
            return redirect()->route('admin.categories.index')
                ->with('status', 'Kategori tidak berada di trash');
        }

        return redirect()->route('admin.categories.index')
            ->with('status', 'Kategori berhasil di restore');
    }

    public function deletePermanent($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        if (!$category->trashed()) {
            return redirect()->route('admin.categories.index')
                ->with('status', 'Tidak dapat menghapus kategori aktif secara permanen');
        } else {
            $category->forceDelete();

            return redirect()->route('admin.categories.index')
                ->with('status', 'Kategori dihapus secara permanen');
        }
    }

    // SELECT2
    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');

        $categories = Category::where("title", "LIKE", "%$keyword%")->get();

        return $categories;
    }
}
