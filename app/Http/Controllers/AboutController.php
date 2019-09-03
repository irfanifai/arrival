<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::paginate(10);
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'title' => 'required',
            'body' => 'required|min:20',
        ]);

        $about = new \App\About;

        $about->title = $request->get('title');
        $about->body = $request->get('body');

        $featured = $request->file('featured');

        if ($featured) {
            $featured_path = $featured->store('featured', 'public');

            $about->featured = $featured_path;
        }

        $about->save();

        return redirect()->route('admin.about.index')
            ->with('status', 'About berhasil dibuat');
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
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
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
        $this->validate($request, [
            'title' => 'required|string|min:5',
            'body' => 'required|min:20'
        ]);

        $abouts = About::findOrFail($id);

        $abouts->title = $request->get('title');
        $abouts->body = $request->get('body');
        $new_featured = $request->file('featured');

        if ($new_featured) {
            if ($abouts->featured && file_exists(storage_path('app/public/' . $abouts->featured))) {
                \Storage::delete('public/' . $abouts->featured);
            }

            $new_featured_path = $new_featured->store('featured', 'public');

            $abouts->featured = $new_featured_path;
        }

        $abouts->save();

        return redirect()->route('admin.about.index')
            ->with('status', 'About berhasil diupdate');

        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
