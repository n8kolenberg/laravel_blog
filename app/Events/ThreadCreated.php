<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/*
 * This whole file is created by adding the corresponding array in EventServiceProvider.php in protected $listener
 * Then you can run php artisan event:generate to have both the Event and Listener created
 * */
class ThreadCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //We can use this to assign to the Class and use it in the listener
    public $thread;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($thread)
    {
        $this->thread = $thread;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
