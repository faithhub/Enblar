<?php

namespace App\Http\Controllers;

use App\Mail\ReplyMail;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MessagesController extends Controller
{
    public function allMessages()
    {
        $fetch = Message::all();
        return view('message/all-messages')->with(['data' => $fetch]);
    }

    public function deleteMessage($id)
    {
        $fetch = Message::where('id', $id)->delete();
        return Redirect::back()->with('success', 'Message Successfully Deleted');
    }

    public function message($id)
    {
        $fetch = Message::where('id', $id)->first();
        return view('message/message')->with(['news' => $fetch]);
    }

    public function reply($id)
    {
        $fetch = Message::where('id', $id)->first();
        return view('message/reply')->with(['news' => $fetch]);
    }
}
