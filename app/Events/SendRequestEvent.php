<?php

namespace App\Events;

use App\Request;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class SendRequestEvent implements shouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $request;
    public $requested_to;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->requested_to = User::findOrFail($this->request->requested_to);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('AlertRequest.'.$this->requested_to->id);
    }
    public function broadcastAs(){
        return 'RequestStatus';
    }
    public function broadcastWith(){

        $requested_by = User::findOrFail($this->request->requested_by);

        return [
            'requested_by' => $requested_by->name,
            'on' => $this->request->created_at->toFormattedDateString(),
            'id' => $this->request->id,
        ];

    }
}
