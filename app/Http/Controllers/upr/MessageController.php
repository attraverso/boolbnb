<?php

namespace App\Http\Controllers\upr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        // Get messages sent to logged on user
        $messages = DB::table('messages')
            ->join('houses', 'houses.id', '=', 'messages.house_id')
            ->where('houses.user_id', '=', Auth::user()->id)
            ->orderBy('messages.created_at', 'DESC')
            ->get();

        return view('upr.messages.index', compact('messages'));
	}
	
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
