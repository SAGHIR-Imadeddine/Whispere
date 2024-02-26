<?php

namespace App\Http\Controllers;


use App\Models\FriendRequest;
use App\Models\User;

use Illuminate\Http\Request;

class AcceptrequestController extends Controller
{

    public function friendRequestsPage()
    {
        
        $friendRequests = auth()->user()->receivedFriendRequests;

        return view('friend-requests', compact('friendRequests'));
    }

    // public function acceptOrDeleteRequest(FriendRequest $friendRequest, $status)
    // {
    //     $currentUser = auth()->user();

    //     // Check if the current user is the receiver of the friend request
    //     if ($currentUser->id !== $friendRequest->friend_id) {
    //         return redirect()->back()->with('error', 'You are not authorized to perform this action.');
    //     }

    //     // Accept friend request
    //     if ($status === 'accept') {
    //         // Add the friend relationship
    //         $currentUser->friends()->attach($friendRequest->user_id);

    //         // Delete the friend request
    //         $friendRequest->delete();

    //         return redirect()->back()->with('success', 'Friend request accepted.');
    //     } 
    //     // Delete friend request
    //     elseif ($status === 'delete') {
    //         $friendRequest->delete();

    //         return redirect()->back()->with('success', 'Friend request deleted.');
    //     } 
    //     else {
    //         return redirect()->back()->with('error', 'Invalid action.');
    //     }
    // }
}

