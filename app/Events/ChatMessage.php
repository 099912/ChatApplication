<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $chatData;
    /**
     * Create a new event instance.
     */
    public function __construct($chatData)
    {
        //
        $this->chatData = $chatData;
    }
    public function broadcastWith()
{
    return ['chat'=>$this->chatData];

}
public function broadcastAs(){
    return 'getChatMessage';
}
    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    //this is channel
    public function broadcastOn()
    {
        return new PrivateChannel('broadcast-message');

    }
    ///this is event

}
