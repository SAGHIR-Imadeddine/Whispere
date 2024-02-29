<?php

namespace App\Http\Controllers;

use App\Events\LocationBroadcast;
use App\Events\PusherBroadcast;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class PusherController extends Controller
{


    public function authenticate(Request $request)
{
    $socketId = $request->input('socket_id');
    $user = auth()->user();
    
    $channelName = 'private-chat.' . $user->id;

    $pusher = new Pusher(
        config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'),
        [
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            'encrypted' => true,
        ]
    );

    $response = $pusher->socket_auth($channelName, $socketId);

    return response($response);
}


    public function index()
    {
        $friends = Conversation::join('users', function ($join) {
            $join->on('conversations.friend_id', '=', 'users.id')
                ->where('conversations.user_id', '=', auth()->id())
                ->orWhere(function ($query) {
                    $query->where('conversations.user_id', '=', auth()->id())
                        ->orWhere('conversations.friend_id', '=', auth()->id());
                });
        })
            ->select('users.*')
            ->get();

        return view('chatt', ['friends' => $friends]);
    }

    public function show(Request $request)
    {
        $friend = $request->input('friend');
        $conversation = Conversation::where(function ($query) use ($friend) {
            $query->where('user_id', auth()->id())
                ->where('friend_id', $friend);
        })->orWhere(function ($query) use ($friend) {
            $query->where('user_id', $friend)
                ->where('friend_id', auth()->id());
        })->first();

        $friends = Conversation::join('users', function ($join) {
            $join->on('conversations.friend_id', '=', 'users.id')
                ->where('conversations.user_id', auth()->id())
                ->orWhere('conversations.friend_id', auth()->id());
        })
            ->select('users.*')
            ->get();
        if ($conversation) {
            $messages = $conversation->messages;
        } else {
            $messages = null; // ou $messages = [];
        }
        return view('chatt', [
            'friend' => $friend,
            'friends' => $friends,
            'messages' => $messages,
        ]);
    }

    public function broadcast(Request $request)
    {
        $user = Auth::user();
        $friendId = $request->input('friend_id', null);
    
        if (!$friendId || $friendId == $user->id) {
            return response()->json(['error' => 'Invalid friend_id'], 400);
        }
    
        $messageContent = $request->input('content', '');
        $isImage = $request->hasFile('image');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
    
        $conversation = Conversation::where(function ($query) use ($user, $friendId) {
            $query->where('user_id', $user->id)
                  ->where('friend_id', $friendId);
        })->orWhere(function ($query) use ($user, $friendId) {
            $query->where('user_id', $friendId)
                  ->where('friend_id', $user->id);
        })->firstOrNew();
    
        if ($isImage) {
            $imagePath = $request->file('image')->store('photos', 'public');
            $mediaUrl = asset('storage/' . $imagePath);
        } else {
            $mediaUrl = null;
        }
    
        $newMessage = null;
    
        if ($messageContent || $isImage) {
            $newMessage = $conversation->messages()->create([
                'user_id' => $user->id,
                'content' => $messageContent,
                'media_url' => $mediaUrl,
            ]);
    
            broadcast(new PusherBroadcast($newMessage->content, $isImage, $friendId))->toOthers();
    
            // if ($latitude && $longitude) {
            //     broadcast(new LocationBroadcast("Location: Latitude $latitude, Longitude $longitude", false, $friendId))->toOthers();
            // }
    
            info('Broadcasted event to friendId: ' . $friendId);
        }
    
        return view('broadcast', [
            'message' => $newMessage ? $newMessage->content : null,
            'mediaUrl' => $mediaUrl,
            'locationDetails' => ($latitude && $longitude) ? [
                'text' => "Location: Latitude $latitude, Longitude $longitude",
                'latitude' => $latitude,
                'longitude' => $longitude,
            ] : null,
        ]);
    }
    
    public function receive(Request $request)
    {
        $message = $request->get('message', '');
        $isImage = $request->get('isImage', false);
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');

        return view('receive', [
            'message' => $message,
            'isImage' => $isImage,
            'locationDetails' => ($latitude && $longitude) ? [
                'text' => "Location: Latitude $latitude, Longitude $longitude",
                'latitude' => $latitude,
                'longitude' => $longitude,
            ] : null,
        ]);
    }
}
