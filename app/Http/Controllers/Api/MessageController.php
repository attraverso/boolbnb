<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index($id) {
        $messages = Message::where('house_id', $id)->get();

        return response()->json([
            'success' => true,
            'count' => $messages->count(),
            'data' => $messages,
        ]);
	}
	
	public function markAsRead($id) {
		$message = Message::find($id);
		$message->is_read = 1;
		$message->update();

		return response()->json([
			'success' => true,
			'data' => $message,
		]);
	}
}
