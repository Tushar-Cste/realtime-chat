<?php

namespace App\Listeners;

use App\Events\Messagesent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessagesentListener
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
     * @param  Messagesent  $event
     * @return void
     */
    public function handle(Messagesent $event)
    {
        //
    }
}
