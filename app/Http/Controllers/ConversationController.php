<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function index()
    {
        // Assuming you have a User model and a 'user' relationship in the Conversation model
        $user = auth()->user();

        // Fetch conversations where the logged-in user is involved and join with the users table
        $friends = DB::table('conversations')
            ->join('users', 'conversations.friend_id', '=', 'users.id')
            ->where('conversations.user_id', $user->id)
            ->orWhere('conversations.friend_id', $user->id)
            ->select('users.*')
            ->get();

        return view('chat', ['friends' => $friends]);
    }
}
