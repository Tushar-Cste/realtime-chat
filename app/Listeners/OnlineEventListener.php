<?php

namespace App\Listeners;

use App\Events\OnlineEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OnlineEventListener
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
     * @param  OnlineEvent  $event
     * @return void
     */
    public function handle(OnlineEvent $event)
    {
        //
    }
}
