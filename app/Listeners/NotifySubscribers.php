<?php

namespace App\Listeners;

use App\Events\ThreadCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/*
 * This whole file is created by adding the corresponding array in EventServiceProvider.php in protected $listener
 * Then you can run php artisan event:generate to have both the Event and Listener created
 * */
class NotifySubscribers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ThreadCreated  $event
     * @return void
     * The following function listens for the notification from ThreadCreated and takes it as the $event argument
     * Then it var_dumps it to the screen
     * You can check this out by going to Tinker and trying:
     * event(new App\Events\ThreadCreated(["name" => "This is the first thread"]));
     */
    public function handle(ThreadCreated $event)
    {
        var_dump($event->thread['name'] . ' was published to forum');
    }
}
