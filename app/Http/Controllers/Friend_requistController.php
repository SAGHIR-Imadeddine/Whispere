<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequest;
use App\Models\User;

class Friend_requistController extends Controller
{
    public function friendRequest(User $user)
    {
        $existingRequest = FriendRequest::where([
            'user_id' => Auth()->id(),
            'friend_id' => $user->id,
        ])->first();

        if ($existingRequest) {
            return redirect()->back()->with('error', 'Friend request already sent.');
        }

        FriendRequest::create([
            'user_id' => Auth()->id(),
            'friend_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Friend request sent successfully.');
    }

    public function removeFriendRequest(User $user)
    {
        FriendRequest::where([
            'user_id' => Auth()->id(),
            'friend_id' => $user->id,
        ])->delete();

        return redirect()->back()->with('success', 'Friend request removed successfully.');
    }
}
