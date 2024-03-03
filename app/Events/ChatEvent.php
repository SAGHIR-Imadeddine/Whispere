<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public User $user;
    public $idR;
    public $idS;
    public function __construct(string $message, User $user,string $idR, string $idS)
    {
        //
        // $this->data='smiti soumiaa';
        $this->message = $message;
        $this->user = $user;
        $this->idR = $idR;
        $this->idS = $idS;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('private.chat.' . $this->idR . '.' . $this->idS),
        ];
    }
    public function broadcastAs(){

        return 'chat-message';
    }
    public function broadcastWith(){

        return [
            'message'=>$this->message,
            'user'=>$this->user->only(['name', 'email'])
        ];
    }

}

