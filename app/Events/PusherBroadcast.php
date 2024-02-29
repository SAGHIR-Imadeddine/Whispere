<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PusherBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ?string $message;
    public ?string $isImage;
    public int $recipientId;

    public User $user;

    public function __construct(?string $message, ?string $isImage, int $recipientId)
    {
        $this->message = $message;
        $this->isImage = $isImage;
        $this->recipientId = $recipientId;
    }

    // public function broadcastOn(): array
    // {
    //     return ['private-chat.2'];
    // }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('private-chat' .$this->recipientId),
        ];
    }


    public function broadcastAs(): string
    {
        return 'chat-message';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }
}
