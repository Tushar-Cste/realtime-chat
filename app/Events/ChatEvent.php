<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Message;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $chatRoomId;
    public $image;
    public $user;
    public function __construct(Message $message, $chatRoomId, $image, $user)
    {

        $this->chatRoomId = $chatRoomId;
        $this->message = $message;
        $this->image = $image;
        $this->user = $user;
        $this->dontBroadcastToCurrentUser();
    }


    public function broadcastOn()
    {
        return new PrivateChannel('chat-roomId-' . $this->chatRoomId);
    }
}
