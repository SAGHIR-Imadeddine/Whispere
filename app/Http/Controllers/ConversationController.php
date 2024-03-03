<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;


class ConversationController extends Controller
{
    //

    public function show(Conversation $conversation)
    {
        $id=auth()->id();
        $convs=Conversation::where('user_id', $id)->get();
        $count=Conversation::where('user_id', $id)->count();
        $messages=Message::where('conversation_id',$conversation->id)->get();
        
        return view('checkingWebSocket',compact('convs','count','conversation','messages'));
    }
    public function index()
    {
        $id=auth()->id();
        $conversations=Conversation::where('user_id', $id)->get();
        $count=Conversation::where('user_id', $id)->count();
        return view('conversation',compact('conversations','count'));
    }

}
