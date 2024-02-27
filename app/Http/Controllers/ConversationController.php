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
        $friends = Conversation::join('users', function ($join) {
                $join->on('conversations.friend_id', '=', 'users.id')
                    ->where('conversations.user_id', '=', auth()->id())
                    ->orWhere(function ($query) {
                        $query->where('conversations.user_id', '=', auth()->id())
                            ->orWhere('conversations.friend_id', '=', auth()->id());
                    });
            })
            ->select('users.*')
            ->get();
    
        return view('chat', ['friends' => $friends]);
    }
    

    
    
    
    
    public function show(Request $request)
    {
        $friend = $request->input('friend');
        $conversation = Conversation::where(function ($query) use ($friend) {
            $query->where('user_id', auth()->id())
                  ->where('friend_id', $friend);
        })->orWhere(function ($query) use ($friend) {
            $query->where('user_id', $friend)
                  ->where('friend_id', auth()->id());
        })->first();
        
        $friends = Conversation::join('users', function ($join) {
            $join->on('conversations.friend_id', '=', 'users.id')
                ->where('conversations.user_id', auth()->id())
                ->orWhere('conversations.friend_id', auth()->id());
        })
        ->select('users.*')
        ->get();
        

            if ($conversation) {
                $messages = $conversation->messages;
        } else {
            $messages = null; // ou $messages = [];
        }

        return view('chat', [
            'friend' => $friend,
            'friends' => $friends,

            'messages' => $messages,
        ]);
    }
}
