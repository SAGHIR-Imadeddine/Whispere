<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $file;


    public function __construct($user, $message, $file)
    {
        $this->user = $user;
        $this->message = $message;
        $this->file = $file;
    }


    public function broadcastOn(): array
    {
        return ['public'];
    }


    public function broadcastWith()
    {
        return [
            'user' => $this->user->name,
            'message' => $this->message,
            'file_url' => $this->file->store('photosMsg', 'public'),
        ];
    }
}
