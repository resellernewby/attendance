<?php

namespace App\Listeners;

use App\Events\StatusEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatusEventListener
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
     * @param  StatusEvent  $event
     * @return void
     */
    public function handle(StatusEvent $event)
    {
        //
    }
}
