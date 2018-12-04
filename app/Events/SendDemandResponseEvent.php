<?php

namespace App\Events;

use App\Demand;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendDemandResponseEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $demand;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Demand $demand)
    {
        $this->demand = $demand;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('DemandAlert.'.$this->demand->added_by);
    }
    public function broadcastAs(){
        return 'DemandStatus';
    }
    public function broadcastWith(){

        $accepted_by = User::findOrFail($this->demand->accepted_by);

        return [
            'accepted' => $accepted_by->name,
            'on' => $this->demand->updated_at->toFormattedDateString(),
        ];

    }
}
