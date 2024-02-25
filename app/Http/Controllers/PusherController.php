<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use App\Models\Message;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function broadcast(Request $request)
{
    $conversationId = 1; 
    $userId = 1; 

    $message = $request->input('content', '');
    $isImage = $request->hasFile('image');

    if ($isImage) {
        $imagePath = $request->file('image')->store('photos', 'public');
        $mediaUrl = asset('storage/' . $imagePath);
    } else {
        $mediaUrl = null;
    }

    // Save the message to the database
    $newMessage = Message::create([
        'conversation_id' => $conversationId,
        'user_id' => $userId,
        'content' => $message,
        'media_url' => $mediaUrl,
    ]);

 if ($isImage) {
        broadcast(new PusherBroadcast(null, $isImage))->toOthers();
    } else {
        broadcast(new PusherBroadcast($newMessage->content, null))->toOthers();
    }
    return view('broadcast', ['message' => $newMessage->content, 'mediaUrl' => $mediaUrl]);
}


    public function receive(Request $request)
    {
        return view('receive', [
            'message' => $request->get('message'),
            'isImage' => $request->get('isImage', false),
        ]);
    }
}

    
//     public function broadcast(Request $request)
// {
//     $user = Auth::user(); // Assuming you are using authentication

//     $message = $request->get('message', '');
//     $isImage = $request->hasFile('image');

//     if ($isImage) {
//         // Handle image upload
//         $imagePath = $request->file('image')->store('photos', 'public');
//         $mediaUrl = asset('storage/' . $imagePath);
//     } else {
//         $mediaUrl = null;
//     }

//     // Save the message to the database
//     $newMessage = Message::create([
//         'conversation_id' => 1, // Replace with the actual conversation ID
//         'user_id' => $user->id,
//         'content' => $message,
//         'media_url' => $mediaUrl,
//     ]);

//     // Broadcast the event
//     broadcast(new PusherBroadcast($newMessage->content, $isImage))->toOthers();

//     return view('broadcast', ['message' => $newMessage->content, 'isImage' => $isImage]);
// }
