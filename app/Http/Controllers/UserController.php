<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conversation;

class UserController extends Controller
{
   public function search(Request $request)
    {
        $identifier = $request->input('unique_identifier');

        $friendIds = Conversation::where('user_id', auth()->id())->pluck('friend_id');

        $friends = User::whereIn('id', $friendIds)
            ->where('unique_identifier', 'like', '%' . $identifier . '%')
            ->get();

        $users = User::where('unique_identifier', 'like', '%' . $identifier . '%')
            ->whereNotIn('id', $friendIds)
            ->get();

        return view('chat', [
            'users' => $users,
            'friends' => $friends,
        ]);
    }
}
