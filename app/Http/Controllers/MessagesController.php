<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $messages = Message::paginate(10);
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $messages = Message::where('name', 'LIKE', "%$filterKeyword%")->paginate(10);
        }
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('status', 'Pesan Telah Dihapus!');
    }
}
