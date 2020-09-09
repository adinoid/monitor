<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel; // for broadcasting to a public Pusher channel

class FinishedCheck implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message; // the message to be sent to the client side

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastAs()
    {
        return 'finished.check';
    }

    public function broadcastOn()
    {
        return new Channel('live-monitor');
    }
}
