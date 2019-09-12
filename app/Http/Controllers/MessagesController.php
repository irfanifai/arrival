<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

     // Fungsi mengirim email
    public function sendEmail(Request $request){
        // Siapkan Data
        $email = $request->email;
        $data = array(
                'name' => $request->name,
                'email_body' => strip_tags($request->email_body)
            );
        // Kirim Email
        Mail::send('admin/messages/email', $data, function($mail) use($email) {
            $mail->to($email, 'support')
                    ->subject("Support Web Arrival");
            $mail->from('arrival@irfanifai.com', 'Support Web Arrival');
        });
        // Cek kegagalan
        if (Mail::failures()) {
            return redirect()->route('admin.messages.index')
                ->with('status', 'Gagal mengirim Email');
        }
        return redirect()->route('admin.messages.index')
            ->with('status', 'Email berhasil dikirim!');
    }
}
