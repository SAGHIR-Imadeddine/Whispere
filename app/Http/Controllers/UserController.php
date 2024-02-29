<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conversation;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->input('unique_identifier');

        $users = User::where('unique_identifier', 'like', '%' . $name . '%')
            ->whereDoesntHave('conversations', function ($query) {
                $query->where('friend_id', auth()->id());
            })
            ->get();

        $friends = Conversation::join('users', 'conversations.friend_id', '=', 'users.id')
            ->where('conversations.user_id', auth()->id())
            ->where('users.unique_identifier', 'like', '%' . $name . '%')
            ->select('users.*')
            ->get();

        return view('chat', [
            'users' => $users,
            'friends' => $friends,
        ]);
    }
}
