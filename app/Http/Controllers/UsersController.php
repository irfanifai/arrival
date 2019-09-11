<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('post')->paginate(10);

        $filterKeyword = $request->get('keyword');

        if($filterKeyword){
            $users = User::where('email', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            "name" => "required|max:30",
            "email" => "required|email|unique:users",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ]);

        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->status = $request->get('status');

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            Storage::putFileAs('public/user', $file, $name);

            $new_user->avatar = 'storage/user/' . $name;
        }

        $new_user->save();
        return redirect()->route('admin.users.index')
            ->with('status', 'User berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
        // $request->validate([
        //     "name" => "required|max:30",
        //     "email" => "required|email",
        //     "status" => "required"
        // ]);

        // $user = User::findOrFail($id);

        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->status = $request->get('status');

        // if ($request->file('avatar')) {
        //     if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
        //         \Storage::delete('public/' . $user->avatar);
        //     }
        //     $file = $request->file('avatar');
        //     $name = $file->getClientOriginalName();
        //     Storage::putFileAs('public/user', $file, $name);

        //     $user->avatar = 'storage/user/' . $name;
        // }

        // $user->save();
        // return redirect()->route('admin.users.index')
        //     ->with('status', 'User berhasil diupdate');

        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('status', 'User berhasil dihapus');
    }
}
