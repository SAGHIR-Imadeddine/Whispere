<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PusherBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ?string $message;
    public ?string $isImage;


    public function __construct(?string $message,?string $isImage)
    {
        $this->message = $message;
        $this->isImage = $isImage;

    }

    public function broadcastOn(): array
    {
        return ['private-chat.' . auth()->id()];
    }

    public function broadcastAs(): string
    {
        return 'chat';
    }
}
