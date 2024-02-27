<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

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
