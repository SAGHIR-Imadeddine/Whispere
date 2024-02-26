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

        $friends = Conversation::where('user_id', auth()->id())
            ->whereHas('friend', function ($query) use ($name) {
                $query->where('unique_identifier', 'like', '%' . $name . '%');
            })
            ->get();

        return view('chat', [
            'users' => $users,
            'friends' => $friends,
        ]);
    }
}
