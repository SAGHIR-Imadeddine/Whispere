<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function index()
    {
        $friends =  Conversation::where('user_id', auth()->user()->id)
        ->orWhere('friend_id', auth()->user()->id)
        ->with('friend') // Charger la relation avec l'utilisateur ami
        ->get();
        return view('chat', ['friends' => $friends]);
    }
    public function show(Request $request)
    {
        $friend = $request->input('friend');
        // Récupérer la conversation entre l'utilisateur authentifié et l'ami
        $conversation = Conversation::where('user_id', auth()->id())
            ->where('friend_id', $friend)
            ->orWhere('user_id', $friend)
            ->where('friend_id', auth()->id())
            ->first();

        $friends = Conversation::join('users', 'conversations.friend_id', '=', 'users.id')
            ->where('conversations.user_id', auth()->id())
            ->select('users.*')
            ->get();

        // Vérifier si la conversation existe
        if ($conversation) {
            // Récupérer les messages de la conversation
            $messages = $conversation->messages;
        } else {
            // Si aucune conversation n'existe, initialiser $messages à null ou à un tableau vide, selon vos besoins
            $messages = null; // ou $messages = [];
        }

        // Passer les messages à la vue
        return view('chat', [
            'friend' => $friend,
            'friends' => $friends,

            'messages' => $messages,
        ]);
    }
}
