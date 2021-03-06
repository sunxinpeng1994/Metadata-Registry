<?php

namespace App\Events;

use App\Models\Import;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImportFinished
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Import
     */
    public $import;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Import $import)
    {
        //
        $this->import = $import;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
