<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Events\MessageSent;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = new Message;
        $message->user_id = auth()->id();
        $message->message = $request->message;
        $message->save();

        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'success' => true,
            'message' => $message,
        ]);


        // return view('chats/chat');
    }


}
