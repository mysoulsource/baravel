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

class SendRequestEvent implements shouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('AlertRequest.'.$this->request->id);
    }
    public function broadcastAs(){
        return 'RequestStatus';
    }
    public function broadcastWith(){

        $requested_by = User::where('id','=',$this->request->requested_by)->get();

        return [
            'requested_by' => $requested_by[0]->name,
            'on' => $this->request->created_at->toFormattedDateString(),
        ];

    }
}
