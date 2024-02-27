<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
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

    
    public function refuseFriendRequest($requestId, $action)
{
    
    $friendRequest = FriendRequest::findOrFail($requestId);

   
    if ($friendRequest->friend_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    
    switch ($action) {
        case 'accept':
          
            $friendRequest->user->friends()->attach($friendRequest->friend_id);
            return redirect()->back()->with('success', 'Friend request accepted successfully.');
           
           
            break;
        case 'refuse':
            
            $friendRequest->delete();
            return redirect()->back()->with('success', 'Friend request declined successfully.');
          
           
            break;
        default:
            abort(400, 'Invalid action.');
    }



}

// public function acceptFriendRequest($requestId)
// {
//     // Find the friend request
//     $friendRequest = FriendRequest::findOrFail($requestId);

//     // Check if the authenticated user is authorized to accept this request
//     if ($friendRequest->friend_id !== auth()->id()) {
//         abort(403, 'Unauthorized action.');
//     }

//     // Update the friend request status to indicate it's accepted
//     $friendRequest->update(['status' => 'accepted']);

//     // Add both users as friends
//     $user = auth()->user();
//     $user->friends()->attach($friendRequest->user_id);
//     $friend = $friendRequest->user;
//     $friend->friends()->attach($user->id);

//     // Create a new conversation
//     $conversation = Conversation::create();
//     $conversation->users()->attach([$user->id, $friend->id]);

//     // Redirect to the conversation page
//     return redirect()->route('conversation.show', ['conversationId' => $conversation->id]);
// }




   

//     public function acceptOrDeleteRequest(FriendRequest $friendRequest, $status)
//     {
//         $currentUser = auth()->user();

//         // Check if the current user is the receiver of the friend request
//         if ($currentUser->id !== $friendRequest->friend_id) {
//             return redirect()->back()->with('error', 'You are not authorized to perform this action.');
//         }

//         // Accept friend request
//         if ($status === 'accept') {
//             // Add the friend relationship
//             $currentUser->friends()->attach($friendRequest->user_id);

//             // Delete the friend request
//             $friendRequest->delete();

//             return redirect()->back()->with('success', 'Friend request accepted.');
//         } 
//         // Delete friend request
//         elseif ($status === 'delete') {
//             $friendRequest->delete();

//             return redirect()->back()->with('success', 'Friend request deleted.');
//         } 
//         else {
//             return redirect()->back()->with('error', 'Invalid action.');
//         }
//     }
}

