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

public function acceptFriendRequest($requestId)
{
    
    $friendRequest = FriendRequest::findOrFail($requestId);

  
    if ($friendRequest->friend_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }


    $friendRequest->update(['request_status' => 'accepted']);

  
    $user = auth()->user();

   
    $friend = $friendRequest->user;

    // $data = [$user->id, $friend];
    $existingConvo = Conversation::where([
        ['user_id', '=', $user->id],
        ['friend_id', '=', $friend->id]
    ])->orWhere([
        ['user_id', '=', $friend->id],
        ['friend_id', '=', $user->id]
    ])->first();

    // $conversations = Conversation::where(function ($query, $friend_id, $user_id) {
    //     $friend_id = $friend;
    //     $query->where('user_id', $user_id)
    //           ->where('friend_id',  $friend_id);
    // })->orWhere(function ($query, $friend_id, $user_id) {
    //     $query->where('user_id', $friend_id)
    //           ->where('friend_id', $user_id);
    // })->get();

    if($existingConvo){

        // dd($existingConvo);
        return redirect()->route('chat', ['conversationId' => $existingConvo->id]);
    
    }else{
        $conversation = Conversation::create([
        'user_id' => $user->id,
        'friend_id' => $friend->id,
        ]);
    
        return redirect()->route('chat', ['conversationId' => $conversation->id]);
    }

   
//  dd($conversation);
  
    // $conversation->users()->attach();

    
    
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
//     $friend = $friendRequest->user;

//     // Check if a conversation already exists between the users
//     $conversation = $user->conversations()->whereHas('users', function ($query) use ($friend) {
//         $query->where('user_id', $friend->id);
//     })->first();

//     if (!$conversation) {
//         // If no conversation exists, create a new one
//         $conversation = Conversation::create();
//         $conversation->users()->attach([$user->id, $friend->id]);
//     }

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

