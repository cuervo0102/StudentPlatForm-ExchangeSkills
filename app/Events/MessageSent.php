<?php

namespace App\Events;

use App\Models\Message;  // Make sure to import your Message model
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Message $message
     * @return void
     */
    public function __construct(Message $message)
        {
            $this->message = $message; 
        }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        /*
            creating an instance of channel to let the system
             know how to send the event or where clients should listen
        */
        return new Channel('chat');  
    }

    /**
     * Get the event name to broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
        /*
            broadcastAs method  to give to event costum name instead of long name
            when its sent to frontend
        */
        return 'message.sent';  
    }



    public function broadcastWith()
    {
        return [
            'message' => [
                'id' => $this->message->id,
                'user' => [
                    'id' => $this->message->user->id,
                    'name' => $this->message->user->name,
                ],
                'message' => $this->message->message,
            ],
        ];
    }

}
