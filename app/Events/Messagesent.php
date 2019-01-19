<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Messagesent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $receiver;
    public $senderId;
    public $messageid;

    public function __construct($receiver, $senderId,$messageid)
    {
        $this->receiver=$receiver;
        $this->senderId=$senderId;
        $this->messageid=$messageid;
        $this->dontBroadcastToCurrentUser();
    }

   

    public function broadcastOn()
    {
        return new PrivateChannel('messagesent-'.$this->receiver);
    }
}
