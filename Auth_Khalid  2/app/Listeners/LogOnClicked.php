<?php

namespace App\Listeners;

use App\Events\Clicked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogOnClicked
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
     * @param Clicked $event
     * @return void
     */
    public function handle(Clicked $event)
    {
        $log = "$event->source | $event->referer --> $event->page";
        Log::channel('clicked')->info($log);
    }
}
