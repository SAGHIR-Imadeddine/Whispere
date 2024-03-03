<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\ChatEvent;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;

class WebSocketController extends Controller
{
    public function chat(Request $request)
    {
        event(new ChatMessageEvent($request->message, auth()->user(),$request->idR,$request->idS));
        event(new ChatEvent($request->message, auth()->user(),$request->idR,$request->idS));
        Message::create([
            'conversation_id'=>$request->conv,
            'user_id'=>$request->idS,
            'content'=>$request->message,
        ]);

        $con=Conversation::where('user_id',$request->idR)->where('friend_id',$request->idS)->first();
        Message::create([
            'conversation_id'=>$con->id,
            'user_id'=>$request->idS,
            'content'=>$request->message,
            
        ]);
    }
}
