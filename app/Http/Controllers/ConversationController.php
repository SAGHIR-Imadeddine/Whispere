<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\User;
use App\Models\Message;


use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Conversation::where('user_id', auth()->id())
            ->orWhere('friend_id', auth()->id())        
            ->with(['user', 'friend'])
            ->get();
    
        foreach ($conversations as $conversation) {
            $conversation->is_user = ($conversation->user_id == auth()->id()) ? 1 : 0;
        }
    
        return view('chat', compact('conversations'));
    }
    
    public function show(Request $request)
    {
        $friend = $request->input('friend');
        $conversation = Conversation::where('user_id', auth()->id())
            ->where('friend_id', $friend)
            ->orWhere('user_id', $friend)
            ->where('friend_id', auth()->id())
            ->first();

        $friends = Conversation::join('users', 'conversations.friend_id', '=', 'users.id')
            ->where('conversations.user_id', auth()->id())
            ->select('users.*')
            ->get();

        if ($conversation) {
            $messages = $conversation->messages;
        } else {
            $messages = null; 
        }

        return view('chat', [
            'friend' => $friend,
            'friends' => $friends,

            'messages' => $messages,
        ]);
    }
}
