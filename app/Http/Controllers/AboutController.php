<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('featured')) {
            $file = $request->file('featured');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/about', $file, $name);

            $about->featured = 'storage/about/' . $name;
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
            'title' => 'required|string|min:5'
        ]);

        $abouts = About::findOrFail($id);

        $abouts->title = $request->get('title');
        $abouts->body = $request->get('body');

        if ($request->hasFile('featured')) {
            if ($abouts->featured && file_exists(storage_path('app/public/' . $abouts->featured))) {
                \Storage::delete('public/' . $abouts->featured);
            }
            $file = $request->file('featured');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/about', $file, $name);

            $abouts->featured = 'storage/about/' . $name;
        }

        $abouts->save();

        return redirect()->route('admin.about.index')
            ->with('status', 'About berhasil diupdate');
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
