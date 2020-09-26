<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'sender_email' => 'required|string|email|max:350',
            'message' => 'required|min:50|max:2000'
        ]);

        $data = $request->all();
        $new_message = new Message();
        $new_message->fill($data);
        $new_message->save();

        return redirect()->back()->with('message', 'Your message was sent!');
    }
}
