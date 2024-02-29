<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function index()
    {
        $user = auth()->user();


        $friends = DB::table('conversations')
            ->join('users', 'conversations.friend_id', '=', 'users.id')
            ->where('conversations.user_id', $user->id)
            ->where('conversations.friend_id', '<>', $user->id)  
            ->orWhere(function ($query) use ($user) {
                $query->where('conversations.friend_id', $user->id)
                    ->where('conversations.user_id', '<>', $user->id); 
            })
            ->select('users.*')
            ->get();

        return view('chat', ['friends' => $friends]);
    }
}
