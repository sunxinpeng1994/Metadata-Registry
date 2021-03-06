<?php

namespace App\Events;

use App\Models\Import;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImportFailed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Import
     */
    public $import;
    /**
     * @var \Exception
     */
    public $exception;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Import $import, \Exception $exception)
    {
        $this->import    = $import;
        $this->exception = $exception;
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
