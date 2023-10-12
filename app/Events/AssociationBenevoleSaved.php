<?php

namespace App\Events;

use App\Models\AssociationBenevole;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssociationBenevoleSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $associationbenevole;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AssociationBenevole $associationBenevole)
    {
        $this->associationbenevole = $associationBenevole;
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
