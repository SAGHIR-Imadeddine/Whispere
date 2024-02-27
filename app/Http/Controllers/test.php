<?php 
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
    // public function index()
    // {
    //     $messages = Message::all(); 
    //     return view('chatt', ['messages' => $messages]);
    // }

    // public function broadcast(Request $request)
    // {
    //     $conversationId = 1;
    //     $userId = 1;
    
    //     $message = $request->input('content', '');
    //     $isImage = $request->hasFile('image');
    
    //     $latitude = $request->input('latitude');
    //     $longitude = $request->input('longitude');
    
    //     if ($isImage) {
    //         $imagePath = $request->file('image')->store('photos', 'public');
    //         $mediaUrl = asset('storage/' . $imagePath);
    //     } else {
    //         $mediaUrl = null;
    //     }
    
    //     // Create a new message only if either the message or the image is present
    //     $newMessage = null;
    //     if ($message || $isImage) {
    //         $newMessage = Message::create([
    //             'conversation_id' => $conversationId,
    //             'user_id' => $userId,
    //             'content' => $message,
    //             'media_url' => $mediaUrl,
    //         ]);
    
    //         if ($isImage) {
    //             broadcast(new PusherBroadcast(null, $isImage))->toOthers();
    //         } elseif ($latitude && $longitude) {
    //             broadcast(new LocationBroadcast("Location: Latitude $latitude, Longitude $longitude", false))->toOthers();
    //         } else {
    //             broadcast(new PusherBroadcast($newMessage->content, null))->toOthers();
    //         }
    //     }
    
    //     return view('broadcast', [
    //         'message' => $newMessage ? $newMessage->content : null,
    //         'mediaUrl' => $mediaUrl,
    //         'locationDetails' => ($latitude && $longitude) ? [
    //             'text' => "Location: Latitude $latitude, Longitude $longitude",
    //             'latitude' => $latitude,
    //             'longitude' => $longitude,
    //         ] : null,
    //     ]);
    // }
    