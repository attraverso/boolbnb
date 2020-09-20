<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;

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
}
