<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Clicked
{
    use Dispatchable, SerializesModels;

    public $source = '';
    public $page = '';
    public $referer = '';

    /**
     * Create a new event instance.
     *
     * @param null $source
     */
    public function __construct($source = null, $page = null, $referer = null)
    {
        $this->source = $source ?? null;
        $this->page = $page ?? null;
        $this->referer = $referer ?? null;
    }
}
